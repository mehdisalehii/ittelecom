<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Redirect;
class ProductController extends \App\Http\Controllers\Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    protected function Stat()
    {
//        $ip = \Request::ip();
//        $ip_check = \App\Models\Stat::where('ip','=',$ip)->whereDate('created_at','=',date('Y-m-d'))->first();
//        if (! $ip_check ){
//            $stat = new \App\Models\Stat();
//            $stat->ip =  \Request::ip() ;
//            $data = \Location::get($ip);
//            if($data){
//                $stat->country =  $data->countryName.','.$data->regionName ;
//            } else {
//                $stat->country = 'Local';
//            }
//            $stat->save();
//        }
    }
    public function category()
    {
        $products = Product::where('thumb', '!=', '')
            ->where(function ($query) {
                $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')

            ->get();
        if (Gate::allows('content_view')) {
            $products = Product::orderBy('id', 'DESC')->get();
        }
        if ($products) {
            return view('web.pages.product.category', compact('products'));
        } else {
            abort(404);
        }
    }
    public function shop()
    {
        $products = Product::where('thumb', '!=', '')
            ->where(function ($query) {
                $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            ->get();
        if (Gate::allows('content_view')) {
            $products = Product::orderBy('id', 'DESC')->get();
        }
        return view('web.pages.product.shop', compact('products'));
    }
    public function redirectToProduct($url)
    {
        $redirect_to = route('product', $url, false);
        return redirect($redirect_to, 301);
    }
    public function show($url)
    {
        $redirect = Redirect::where('slug', $url)->first();
        if ($redirect) {
            return redirect($redirect->redirect_to);
        }
        $id = Product::where('slug', urlencode($url))->value('id');
        $product = Product::where('thumb', '!=', '')
            ->where(function ($query) {
                $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
            })
            ->where('slug', urlencode($url))->first();
        $category_menu = Menu::where('type', '=', 'product')->orderBy('sort', 'ASC')->get();
        $categories = Category::where('no_id', '=', $id)->where('type', '=', 'product')->get();
        if ($this->user) {
            $username = $this->user->username;
            // $role = User::where('username', $username)->value('role');
            // if ( $role == 'admin' ){
            $product = Product::where('slug', urlencode($url))->first();
            // }
        }
        // $cat = Product::where('slug', urlencode($url) )->value('cat');
        // $related = Product::relatedProducts(4, true)->get();
        // $related = Product::where('id','!=',$id)->where('cat', explode(',', $cat) )->get();
        // $related = Product::where('thumb','!=','')->where('cat', 'like', '%' .  $cat . '%') ->get();
        // $related = Product::where('id','!=',$id)->where('publish','=','on')->limit(1)->get();
        // $related = Product::select('cat')->where('publish','=','on')->get();
        $menu_id = Category::where('type', '=', 'product')->where('no_id', '=', $id)->first();
        // $query = DB::table('tags_value')->whereRaw('FIND_IN_SET("css", Tags)')->get();
        // $searchvalue = '1,82';
        // $related = Product::whereRaw("find_in_set( cat , ($cat))")->get();
        if ($product) {
            $product->visit();
            return view('web.pages.product.id', compact('url', 'category_menu', 'categories', 'product', 'menu_id', 'id'));
        } else {
            $post = Post::where('slug', urlencode($url))->where('type', '=', 'post')->first();
            if ($post) {
                return redirect('blog/' . $post->slug);
            }
            abort(404);
        }
    }
}
