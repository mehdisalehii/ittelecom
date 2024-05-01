<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Product;
use App\Models\Topic;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class SitemapController extends \App\Http\Controllers\Controller
{

    public function robots()
    {
        $contents = view('web.pages.seo.robots');
        return response($contents)->header('Content-Type', 'text/plain');
    }

    public function sitemap()
    {
        $menu_posts = Menu::where('type', 'post')->orderBy('updated_at', 'DESC')->get();
        $menu_forums = Menu::where('type', 'forum')->orderBy('updated_at', 'DESC')->get();
        $menu_products = Menu::where('type', 'product')->where('parent', '0')->orderBy('updated_at', 'DESC')->get();
        $all_menu_records = Menu::orderBy('id', 'ASC')->get();
        $posts = Post::where('type', 'post')->where('publish', 'on')->orderBy('updated_at', 'DESC')->get();
        $products = Product::orderBy('updated_at', 'DESC')->get();
        $forums = Topic::where(function ($query) {
            $query->where('type', 'q')->orWhere('type', 'product');
        })->orderBy('id', 'ASC')->get();
        $tags = Tag::orderBy('id', 'desc')->get();

        $data = array(
            'menu_posts' => $menu_posts,
            'menu_products' => $menu_products,
            'menu_forums' => $menu_forums,
            'all_menu_records' => $all_menu_records,
            'posts' => $posts,
            'products' => $products,
            'forums' => $forums,
            'tags' => $tags,
        );

        $contents = view('web.pages.seo.sitemap', $data);
        return response($contents)->header('Content-Type', 'application/xml');
    }

}
