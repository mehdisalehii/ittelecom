<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use App\Models\Post;
use App\Models\Product;
use App\Models\Redirect;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class CategoryController extends \App\Http\Controllers\Controller
{
    protected function Stat()
    {
//        $ip = \Request::ip();
//        $ip_check = \App\Models\Stat::where('ip', '=', $ip)->whereDate('created_at', '=', date('Y-m-d'))->first();
//        if (!$ip_check) {
//            $stat = new \App\Models\Stat();
//            $stat->ip = \Request::ip();
//            $data = \Location::get($ip);
//            if ($data) {
//                $stat->country = $data->countryName . ',' . $data->regionName;
//            } else {
//                $stat->country = 'Local';
//            }
//            $stat->save();
//        }
    }

    public function categoryProduct(string $categorySlug, ?string $subCategorySlug = null, ?string $subSubCategorySlut = null)
    {
        if (!empty($subSubCategorySlut)) {
            $slug = $subCategorySlug;
        } else if (!empty($subCategorySlug)) {
            $slug = $subCategorySlug;
        } else {
            $slug = $categorySlug;
        }
        $redirect = Redirect::where('slug', $slug)->first();
        if ($redirect) {
            return redirect($redirect->redirect_to);
        }
        $menu = Menu::with('faqs')->where('slug', $slug)->first();
        abort_if(empty($menu), 404);
        $idsOfProductsInThisCategory = Category::where('menu_ids', $menu->id)->where('type', 'product')->pluck('no_id');
        $productsQuery = Product::where('thumb', '!=', '');

        if (!Gate::allows('sale_view') && !Gate::allows('content_view')) {
            $productsQuery->where(function ($query) {
                $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
            });
        }
        $subCategories = \App\Models\Menu::where('class_name', '<>', 'display-none')
            ->where('parent', $menu->id)
            ->orderBy('sort', 'ASC')
            ->get();
        $idsOfProductsInSubCategoryOfThisCategory = $subCategories->pluck('id');
        $productsQuery->where(function ($q) use ($idsOfProductsInSubCategoryOfThisCategory, $idsOfProductsInThisCategory) {
            foreach ($idsOfProductsInSubCategoryOfThisCategory as $categoryId) {
                $q->orWhereRaw("find_in_set( $categoryId ,menu_ids)");
            }
            $q->orWhereIn('id', $idsOfProductsInThisCategory);
        });
//         dd($productsQuery->toSql(), $subCategories);
        $products = $productsQuery->orderBy('created_at', 'DESC')->get();
        $data = array(
            'menu' => $menu,
            'products' => $products,
            'subCategories' => $subCategories,
        );
        return view('web.pages.product.category.index', $data);
    }

    public function categoryPost($url)
    {


        $redirect = Redirect::where('slug', $url)->first();
        if ($redirect) {
            return redirect($redirect->redirect_to);
        }
        $category = Menu::where('slug', urlencode($url))->where('type', '=', 'post')->first();
        $category_blog = Menu::where('type', '=', 'post')->orderBy('id', 'ASC')->get();

        $posts_cat = 'category/article/';
        $url_current = $url;
        $url = str_replace($posts_cat, '', $url_current);
        if (substr($url, -1) == '/') {
            $url = substr($url, 0, -1);
            $urls = explode('/', $url);
            $last_url = end($urls);
        } else {
            $urls = explode('/', $url);
            $last_url = end($urls);
        }
        $last_url = urlencode($last_url);

        $menu = Menu::where('slug', urlencode($last_url))->first();
        $id = Menu::where('slug', urlencode($url))->value('id');

        $s1 = '';
        $s2 = '';
        $s3 = '';
        $s4 = '';
        $cat_id = '0';
        $menu_main = Menu::where('type', '=', 'post')->where('slug', '=', $last_url)->orderBy('id', 'ASC')->get();
        foreach ($menu_main as $row_main) {
            $s1 = $row_main->slug;
            $id = $row_main->id;
            $cat_id = $id;
            $id_parent_1 = $row_main->parent;
            $menu_sub = Menu::where('id', '=', $id_parent_1)->orderBy('id', 'ASC')->get();
            foreach ($menu_sub as $sub_cat) {
                $s2 = $sub_cat->slug . '/';
                $id_parent_2 = $sub_cat->parent;
                $menu_child = Menu::where('id', '=', $id_parent_2)->orderBy('id', 'ASC')->get();
                foreach ($menu_child as $child_cat) {
                    $s3 = $child_cat->slug . '/';
                    $id_parent_3 = $child_cat->parent;
                    $menu_child_2 = Menu::where('id', '=', $id_parent_3)->orderBy('id', 'ASC')->get();
                    foreach ($menu_child_2 as $child_cat_2) {
                        $s3 = $child_cat_2->slug . '/';
                        $id_parent_3 = $child_cat_2->parent;
                    }
                }
            }
        }

        $LinkCheck = $posts_cat . $s4 . $s3 . $s2 . $s1;
        $start = Request()->start;
        $limit = 5;

        $posts_id = null;
        if (!empty($id)) {
            $posts_id = Category::whereRaw("find_in_set( $id ,menu_ids)")->groupBy('no_id')->orderBy('no_id', 'DESC')->skip(0)->take($limit)->get();
        }
        abort_if(empty($posts_id), 404);
        $archive_cat_posts = Post::where('type', '=', 'post')
            ->where('thumb', '!=', '')
            ->where(function ($query) {
                $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            // ->whereRaw("find_in_set( $cat_id ,menu_ids)")
            // ->skip(0)->take( $limit )
            ->get();
        $users = User::orderBy('id', 'DESC')->get();
        $reading = Post::where('type', '=', 'post')->where('thumb', '!=', '')->where('publish', '=', 'on')->orderBy('created_at', 'DESC')->limit(15)->get();
        $data = array(
            'url' => $url,
            'category_blog' => $category_blog,
            'category' => $category,
            'LinkCheck' => $LinkCheck,
            'menu' => $menu,
            'cat_id' => $cat_id,
            'last_url' => $last_url,
            'posts_id' => $posts_id,
            'archive_cat_posts' => $archive_cat_posts,
            'users' => $users,
            'reading' => $reading,
        );
        if ($category) {
            return view('web.pages.category.id_blog', $data);
        } else {
            abort(404); // return view('errors.404' , $data );
        }
    }
}
