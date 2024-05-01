<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

use App\Models\Menu;
use App\Models\Post;
use App\Models\Product;
use App\Models\Stat;
use App\Models\Setting;

class GlobalConfigMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Route::currentRouteName() == 'login' || \Route::currentRouteName() == 'logout'){
            return route('home');
        }
        /// Dark/Light Theme
        // Cookie::queue(Cookie::make('name', 'value', 30));
        // $theme = Cookie::get('theme');
        // if ($theme != 'dark-theme' && $theme != '') {
        //     $theme = '';
        // }
        // // $view->with('theme', $theme); /// go to class body '$theme'
        // view()->share('theme', $theme);

        // Role
        // $roles = Role::all(); // ->sortByDesc("id");
        // $view->with('roles', $roles);

        // Class Body Name
        if (Auth::guard('web')->user()) {
            if (strpos(URL::current(), '/admin') !== false) {
                $guard = 'admin admin-logined';
            } else {
                $guard = 'web admin-logined';
            }
        } else {
            switch (URL::current()) {
                case(strpos(URL::current(), '/login') !== false) :
                    $guard = 'login';
                    break;
                case(strpos(URL::current(), '/register') !== false) :
                    $guard = 'login register';
                    break;
                default :
                    $guard = '';
            }
        }
        switch (URL::current()) {
            case(route('home')) :
                $page_name = 'home';
                break;
            case(strpos(URL::current(), 'forum') !== false) :
                $page_name = 'forum';
                break;
            default :
                $page_name = 'page';
        }
        $class_body = $guard . ' ' . $page_name;

        // $class_body = 'test';
        // $view->with('class_body', $class_body );
        view()->share('class_body', $class_body);

        // Class Form Create/Edit
        switch (URL::current()) {
            case(str_contains(URL::current(), '/create') !== false) :
                $class_form = 'form-content create';
                break;
            case(str_contains(URL::current(), '/edit') !== false) :
                $class_form = 'form-content edit';
                break;
            default :
                $class_form = 'no-form';
        }
        // $class_form = 'test';
        // $view->with('class_form', $class_form);
        view()->share('class_form', $class_form);


//        /// Method to redirect to the previous page
//        $previous = "javascript:history.go(-1)";
//        if (isset($_SERVER['HTTP_REFERER'])) {
//            $previous_page = $_SERVER['HTTP_REFERER'];
//        } else {
//            $previous_page = route('home');
//        }
//        view()->share('previous_page', $previous_page);


        // Setting
        // $settings = Setting::all();
        // $view->with('settings', $settings);

        // Time Setting
        // $time_settings = [
        //     'company_timezone' => 'UTC',
        //     'company_date_format' => 'Y-m-d H:i:s',
        //     'display_time' => true,
        // ];
        // view()->share('time_settings', $time_settings);

        /// Product
        // $products_for_menu = Product::orderBy('id', 'ASC')->where('thumb','!=','')->get();
        // $view->with('products_for_menu', $products_for_menu);

        /// Main NavBar
        // $navbars_main = Menu::orderBy('sort', 'ASC')->where('type','=','product')->where('parent','=','0')->get();
        // $view->with('navbars_main', $navbars_main);

        /// Sub NavBar
        // $navbars_sub = Menu::orderBy('sort', 'ASC')->get();
        // $view->with('navbars_sub', $navbars_sub);

        return $next($request);
    }
}
