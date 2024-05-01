<?php

namespace App\Http\Controllers\AMP;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\User;
use App\Models\Post;
use App\Models\Product;

class CategoryController extends \App\Http\Controllers\Controller
{

    public function categoryProduct($main_cat){

        $category = Menu::where('slug', urlencode($main_cat) )->where('type','=','product')->first();

        $products_cat = 'products/cat/';
        $url_current = $main_cat ;
        $url = str_replace( $products_cat , '', $url_current);
        if(substr($url, -1) == '/') {
            $url = substr($url, 0, -1);
            $urls = explode('/', $url);
            $last_url = end($urls);
        } else {
            $urls = explode('/', $url);
            $last_url = end($urls);
        }

        $last_url = urlencode($last_url);


        $menu = Menu::where('slug', urlencode($last_url) )->first();

        $s1 = '';
        $s2 = '';
        $s3 = '';
        $s4 = '';
        $cat_id = '0';
        $menu_main = Menu::where('type','=','product')->where('slug','=', $last_url )->orderBy('id', 'ASC')->get();
        foreach( $menu_main as $row_main ) {
            $s1 = $row_main->slug;
            $id = $row_main->id; $cat_id = $id;
            $id_parent_1 = $row_main->parent;
            $menu_sub = Menu::where('id','=', $id_parent_1 )->orderBy('id', 'ASC')->get();
            foreach($menu_sub as $sub_cat) {
                $s2 = $sub_cat->slug.'/';
                $id_parent_2 = $sub_cat->parent;
                $menu_child = Menu::where('id','=', $id_parent_2 )->orderBy('id', 'ASC')->get();
                foreach($menu_child as $child_cat) {
                    $s3 = $child_cat->slug.'/';
                    $id_parent_3 = $child_cat->parent;
                    $menu_child_2 = Menu::where('id','=', $id_parent_3 )->orderBy('id', 'ASC')->get();
                    foreach($menu_child_2 as $child_cat_2) {
                        $s3 = $child_cat_2->slug.'/';
                        $id_parent_3 = $child_cat_2->parent;
                    }
                }
            }
        }


        $LinkCheck = $products_cat.$s4.$s3.$s2.$s1;

        $start = Request()->start;
        $limit = 2000;

        $archive_cat_products = Product::where('thumb','!=','')
                                    ->where(function($query) {
                                        $query->where('publish','=','publish')->orWhere('publish', '=', 'on');
                                    })
                                    ->orderBy('id', 'DESC')
                                    ->whereRaw("find_in_set( $cat_id ,menu_ids)")
                                    ->skip(0)->take( $limit )
                                    ->get();

        $users = User::orderBy('id', 'DESC')->get();

        $data = array(
            'main_cat'=>$main_cat,

            'category'=>$category,

            'LinkCheck' => $LinkCheck,
            'menu' => $menu,
            'cat_id' => $cat_id,
            'last_url' => $last_url,
            'archive_cat_products'=>$archive_cat_products,
            'users'=>$users,

        );

        if($category){
            return view('amp.pages.category.category', $data );
        } else {
            abort(404); // return view('errors.404' , $data );
        }

    }


    public function subcategoryProduct($main_cat,$sub_cat){


        $category = Menu::where('slug', urlencode($sub_cat) )->where('type','=','product')->first();



        $products_cat = 'products/cat/';
        $url_current = $main_cat.'/'.$sub_cat ;
        $url = str_replace( $products_cat , '', $url_current);
        if(substr($url, -1) == '/') {
            $url = substr($url, 0, -1);
            $urls = explode('/', $url);
            $last_url = end($urls);
        } else {
            $urls = explode('/', $url);
            $last_url = end($urls);
        }

        $last_url = urlencode($last_url);


        $menu = Menu::where('slug', urlencode($last_url) )->first();

        $s1 = '';
        $s2 = '';
        $s3 = '';
        $s4 = '';
        $cat_id = '0';
        $menu_main = Menu::where('type','=','product')->where('slug','=', $last_url )->orderBy('id', 'ASC')->get();
        foreach( $menu_main as $row_main ) {
            $s1 = $row_main->slug;
            $id = $row_main->id; $cat_id = $id;
            $id_parent_1 = $row_main->parent;
            $menu_sub = Menu::where('id','=', $id_parent_1 )->orderBy('id', 'ASC')->get();
            foreach($menu_sub as $sub_cat) {
                $s2 = $sub_cat->slug.'/';
                $id_parent_2 = $sub_cat->parent;
                $menu_child = Menu::where('id','=', $id_parent_2 )->orderBy('id', 'ASC')->get();
                foreach($menu_child as $child_cat) {
                    $s3 = $child_cat->slug.'/';
                    $id_parent_3 = $child_cat->parent;
                    $menu_child_2 = Menu::where('id','=', $id_parent_3 )->orderBy('id', 'ASC')->get();
                    foreach($menu_child_2 as $child_cat_2) {
                        $s3 = $child_cat_2->slug.'/';
                        $id_parent_3 = $child_cat_2->parent;
                    }
                }
            }
        }


        $LinkCheck = $products_cat.$s4.$s3.$s2.$s1;

        $start = Request()->start;
        $limit = 2000;

        $archive_cat_products = Product::where('thumb','!=','')
                                    ->where(function($query) {
                                        $query->where('publish','=','publish')->orWhere('publish', '=', 'on');
                                    })
                                    ->orderBy('id', 'DESC')
                                    ->whereRaw("find_in_set( $cat_id ,menu_ids)")
                                    ->skip(0)->take( $limit )
                                    ->get();

        $users = User::orderBy('id', 'DESC')->get();

        $data = array(
            'main_cat'=>$main_cat,

            'category'=>$category,

            'LinkCheck' => $LinkCheck,
            'menu' => $menu,
            'cat_id' => $cat_id,
            'last_url' => $last_url,
            'archive_cat_products'=>$archive_cat_products,
            'users'=>$users,

        );

        if($category){
            return view('amp.pages.category.category', $data );
        } else {
            abort(404); // return view('errors.404' , $data );
        }

    }


    public function childcategoryProduct($main_cat,$sub_cat,$child_cat){


        $category = Menu::where('slug', urlencode($child_cat) )->where('type','=','product')->first();



        $products_cat = 'products/cat/';
        $url_current = $main_cat.'/'.$sub_cat.'/'.$child_cat ;
        $url = str_replace( $products_cat , '', $url_current);
        if(substr($url, -1) == '/') {
            $url = substr($url, 0, -1);
            $urls = explode('/', $url);
            $last_url = end($urls);
        } else {
            $urls = explode('/', $url);
            $last_url = end($urls);
        }

        $last_url = urlencode($last_url);


        $menu = Menu::where('slug', urlencode($last_url) )->first();

        $s1 = '';
        $s2 = '';
        $s3 = '';
        $s4 = '';
        $cat_id = '0';
        $menu_main = Menu::where('type','=','product')->where('slug','=', $last_url )->orderBy('id', 'ASC')->get();
        foreach( $menu_main as $row_main ) {
            $s1 = $row_main->slug;
            $id = $row_main->id; $cat_id = $id;
            $id_parent_1 = $row_main->parent;
            $menu_sub = Menu::where('id','=', $id_parent_1 )->orderBy('id', 'ASC')->get();
            foreach($menu_sub as $sub_cat) {
                $s2 = $sub_cat->slug.'/';
                $id_parent_2 = $sub_cat->parent;
                $menu_child = Menu::where('id','=', $id_parent_2 )->orderBy('id', 'ASC')->get();
                foreach($menu_child as $child_cat) {
                    $s3 = $child_cat->slug.'/';
                    $id_parent_3 = $child_cat->parent;
                    $menu_child_2 = Menu::where('id','=', $id_parent_3 )->orderBy('id', 'ASC')->get();
                    foreach($menu_child_2 as $child_cat_2) {
                        $s3 = $child_cat_2->slug.'/';
                        $id_parent_3 = $child_cat_2->parent;
                    }
                }
            }
        }


        $LinkCheck = $products_cat.$s4.$s3.$s2.$s1;

        $start = Request()->start;
        $limit = 2000;

        $archive_cat_products = Product::where('thumb','!=','')
                                    ->where(function($query) {
                                        $query->where('publish','=','publish')->orWhere('publish', '=', 'on');
                                    })
                                    ->orderBy('id', 'DESC')
                                    ->whereRaw("find_in_set( $cat_id ,menu_ids)")
                                    ->skip(0)->take( $limit )
                                    ->get();

        $users = User::orderBy('id', 'DESC')->get();

        $data = array(
            'main_cat'=>$main_cat,

            'category'=>$category,

            'LinkCheck' => $LinkCheck,
            'menu' => $menu,
            'cat_id' => $cat_id,
            'last_url' => $last_url,
            'archive_cat_products'=>$archive_cat_products,
            'users'=>$users,

        );

        if($category){
            return view('amp.pages.category.category', $data );
        } else {
            abort(404); // return view('errors.404' , $data );
        }

    }



    public function categoryPost($url) {

        $category = Menu::where('slug', urlencode($url) )->where('type','=','post')->first();

        $category_blog = Menu::where('type','=','post')->orderBy('id', 'ASC')->get();

        $posts_cat = 'category/article/';
        $url_current = $url ;
        $url = str_replace( $posts_cat , '', $url_current);
        if(substr($url, -1) == '/') {
            $url = substr($url, 0, -1);
            $urls = explode('/', $url);
            $last_url = end($urls);
        } else {
            $urls = explode('/', $url);
            $last_url = end($urls);
        }

        $last_url = urlencode($last_url);


        $menu = Menu::where('slug', urlencode($last_url) )->first();

        $s1 = '';
        $s2 = '';
        $s3 = '';
        $s4 = '';
        $cat_id = '0';
        $menu_main = Menu::where('type','=','post')->where('slug','=', $last_url )->orderBy('id', 'ASC')->get();
        foreach( $menu_main as $row_main ) {
            $s1 = $row_main->slug;
            $id = $row_main->id; $cat_id = $id;
            $id_parent_1 = $row_main->parent;
            $menu_sub = Menu::where('id','=', $id_parent_1 )->orderBy('id', 'ASC')->get();
            foreach($menu_sub as $sub_cat) {
                $s2 = $sub_cat->slug.'/';
                $id_parent_2 = $sub_cat->parent;
                $menu_child = Menu::where('id','=', $id_parent_2 )->orderBy('id', 'ASC')->get();
                foreach($menu_child as $child_cat) {
                    $s3 = $child_cat->slug.'/';
                    $id_parent_3 = $child_cat->parent;
                    $menu_child_2 = Menu::where('id','=', $id_parent_3 )->orderBy('id', 'ASC')->get();
                    foreach($menu_child_2 as $child_cat_2) {
                        $s3 = $child_cat_2->slug.'/';
                        $id_parent_3 = $child_cat_2->parent;
                    }
                }
            }
        }


        $LinkCheck = $posts_cat.$s4.$s3.$s2.$s1;

        $start = Request()->start;
        $limit = 5;

        $archive_cat_posts = Post::where('type','=','post')
                                    ->where('thumb','!=','')
                                    ->where(function($query) {
                                        $query->where('publish','=','publish')->orWhere('publish', '=', 'on');
                                    })
                                    ->orderBy('id', 'DESC')
                                    ->whereRaw("find_in_set( $cat_id ,menu_ids)")
                                    ->skip(0)->take( $limit )
                                    ->get();

        $users = User::orderBy('id', 'DESC')->get();

        $reading = Post::where('type','=','post')->where('publish','=','publish')->orWhere('publish', '=', 'on')->orderBy('created_at', 'DESC')->limit(15)->get();

        $data = array(
            'url'=>$url,
            'category_blog' => $category_blog,
            'category'=>$category,

            'LinkCheck' => $LinkCheck,
            'menu' => $menu,
            'cat_id' => $cat_id,
            'last_url' => $last_url,
            'archive_cat_posts'=>$archive_cat_posts,
            'users'=>$users,
            'reading'=>$reading,
        );

        if($category){
            return view('amp.pages.category.category_blog', $data );
        } else {
            abort(404); // return view('errors.404' , $data );
        }
    }

}
