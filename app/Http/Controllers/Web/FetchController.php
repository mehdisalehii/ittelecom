<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Post;
use App\Models\Product;
use App\Models\Topic;
use App\Models\Download;
use App\Models\Datasheet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class FetchController extends \App\Http\Controllers\Controller
{
    public function Fetch_URL(Request $data_start, $url_fetch)
    {
        $data_start = $data_start->input('data_start');
        $limit = 5;
        if ($url_fetch == 'blog') {
            $posts = Post::where('type', '=', 'post')
                ->where('thumb', '!=', '')
                ->where(function ($query) {
                    $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
                })
                ->orderBy('id', 'DESC')
                ->skip($data_start)
                ->take($limit)
                ->get();
            if (Gate::allows('content_view')) {
                $posts = Post::where('type', '=', 'post')
                    ->orderBy('id', 'DESC')
                    ->skip($data_start)->take($limit)
                    ->get();
            }
            $category_blog = Menu::where('type', '=', 'post')->orderBy('sort', 'ASC')->get();
            $users = User::orderBy('id', 'DESC')->get();
            return view('web.pages.ajax.fetch', ['url_fetch' => $url_fetch, 'posts' => $posts, 'users' => $users, 'category_blog' => $category_blog]);
        }
        if ($url_fetch == 'shop') {
            $limit = 2000;
            $products = Product::where('thumb', '!=', '')
                ->where(function ($query) {
                    $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
                })
                ->orderBy('id', 'DESC')
                ->skip($data_start)
                ->take($limit)
                ->get();
            if (Gate::allows('content_view')) {
                $products = Product::orderBy('id', 'DESC')->skip($data_start)->take($limit)->get();
            }
            return view('web.pages.ajax.fetch', compact('url_fetch', 'products'));
        }
        if ($url_fetch == 'forum') {
            $users = User::orderBy('id', 'DESC')->get();
            $category_menu = Menu::where('type', '=', 'forum')->orderBy('sort', 'ASC')->get();
            $forum = Topic::where('type', '=', 'q')
                ->where(function ($query) {
                    $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
                })
                ->orderBy('id', 'DESC')
                ->skip($data_start)
                ->take($limit)
                ->get();
            return view('web.pages.ajax.fetch', ['url_fetch' => $url_fetch, 'forum' => $forum, 'users' => $users, 'category_menu' => $category_menu]);
        }
    }

    public function Fetch_URL_CAT_Product(Request $data_start, $url_fetch)
    {
        $data_start = $data_start->input('data_start');
        $data_id = Request()->data_id;
        $limit = 2000;
        $id = Menu::where('slug', urlencode($url_fetch))->value('id');

        $products_id = null;
        if (!empty($id)) {
            $products_id = Category::whereRaw("find_in_set( $id ,menu_ids)")->groupBy('no_id')->orderBy('no_id', 'DESC')->skip($data_start)->take($limit)->get();
        }
        abort_if(empty($products_id), 404);
        $archive_cat_fetch = Product::where('thumb', '!=', '')
            ->where(function ($query) {
                $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            // ->whereRaw("find_in_set( $data_id ,menu_ids)")
            // ->skip( $data_start )->take( $limit )
            ->get();
        if (Gate::allows('content_view')) {
            $archive_cat_fetch = Product::orderBy('id', 'DESC')
                // ->whereRaw("find_in_set( $data_id ,menu_ids)")
                // ->skip( $data_start )->take( $limit )
                ->get();
        }
        $users = User::orderBy('id', 'DESC')->get();
        $category_menu = Menu::where('type', '=', 'topics')->orderBy('sort', 'ASC')->get();
        $data = array(
            'archive_cat_fetch' => $archive_cat_fetch,
            'users' => $users,
            'products_id' => $products_id,
            'category_menu' => $category_menu,
            'data_id' => $data_id,
            'data_start' => $data_start,
            'url_fetch' => $url_fetch
        );
        return view('web.pages.ajax.fetch', $data);

    }

    public function Fetch_URL_CAT(Request $data_start, $data_id, $url_fetch)
    {
        $data_start = $data_start->input('data_start');
        $data_id = Request()->data_id;
        $limit = 2000;
        $archive_cat_fetch = Product::where('thumb', '!=', '')
            ->where(function ($query) {
                $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            ->whereRaw("find_in_set( $data_id ,menu_ids)")
            ->skip($data_start)->take($limit)
            ->get();

        if (Gate::allows('content_view')) {
            $archive_cat_fetch = Product::orderBy('id', 'DESC')
                ->whereRaw("find_in_set( $data_id ,menu_ids)")
                ->skip($data_start)->take($limit)
                ->get();
        }
        $archive_cat_fetch_rt = Topic::where('type', '=', 'q')
            ->where(function ($query) {
                $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            ->whereRaw("find_in_set( $data_id ,menu_ids)")
            ->skip($data_start)->take($limit)
            ->get();

        $archive_cat_fetch_products = Topic::where('type', '=', 'product')
            ->where(function ($query) {
                $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            ->whereRaw("find_in_set( $data_id ,menu_ids)")
            ->skip($data_start)->take($limit)
            ->get();
        $users = User::orderBy('id', 'DESC')->get();
        $category_menu = Menu::where('type', '=', 'topics')->orderBy('sort', 'ASC')->get();
        $data = array(
            'archive_cat_fetch' => $archive_cat_fetch,
            'archive_cat_fetch_rt' => $archive_cat_fetch_rt,
            'archive_cat_fetch_products' => $archive_cat_fetch_products,
            'users' => $users,
            'category_menu' => $category_menu,
            'data_id' => $data_id,
            'data_start' => $data_start,
            'url_fetch' => $url_fetch
        );
        return view('web.pages.ajax.fetch', $data);

    }

    public function Fetch_URL_Blog_CAT(Request $data_start, $url_fetch)
    {
        $data_start = $data_start->input('data_start');
        $data_id = Request()->data_id;
        $limit = 5;
        $id = Menu::where('slug', urlencode($url_fetch))->value('id');
        $posts_id = Category::whereRaw("find_in_set( $id ,menu_ids)")->groupBy('no_id')->orderBy('no_id', 'DESC')->skip(0)->take($limit)->get();
        $archive_cat_fetch = Post::where('type', '=', 'post')
            ->where('thumb', '!=', '')
            ->where(function ($query) {
                $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            // ->whereRaw("find_in_set( $data_id ,menu_ids)")
            // ->skip( $data_start )->take( $limit )
            ->get();
        if (Gate::allows('content_view')) {
            $archive_cat_fetch = Post::where('type', '=', 'post')
                ->orderBy('id', 'DESC')
                // ->whereRaw("find_in_set( $data_id ,menu_ids)")
                // ->skip( $data_start )->take( $limit )
                ->get();
        }
        $users = User::orderBy('id', 'DESC')->get();
        $category_blog = Menu::where('type', '=', 'post')->orderBy('id', 'ASC')->get();
        $data = array(
            'archive_cat_fetch' => $archive_cat_fetch,
            'data_id' => $data_id,
            'data_start' => $data_start,
            'url_fetch' => $url_fetch,
            'posts_id' => $posts_id,
            'users' => $users,
            'category_blog' => $category_blog,

        );
        return view('web.pages.ajax.fetch', $data);

    }

    public function Fetch_URL_Search(Request $keyword, $url_fetch)
    {
        $keyword = Request()->keyword;
        $keyword_menu = Menu::orderBy('id', 'ASC')
            ->where('type', 'product')
            ->where('title', 'like', '%' . $keyword . '%')
            ->orWhere('content', 'like', '%' . $keyword . '%')
            ->limit(5)
            ->get();
        $keyword_products = Product::where('thumb', '!=', '')
            ->where(function ($query) {
                $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
            })
            ->where(function ($query) use ($keyword){
                $query
                    ->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('content', 'like', '%' . $keyword . '%')
                    ->orWhere('detials', 'like', '%' . $keyword . '%')
                    ->orWhere('slug', 'like', '%' . $keyword . '%')
                    ->orWhere('sku', 'like', '%' . $keyword . '%')
                    ->orWhere('sku_n', 'like', '%' . $keyword . '%')
                    ->orWhere('sku', 'like', '%' . str_replace(' ', '-', $keyword) . '%')
                    ->orWhere('sku_n', 'like', '%' . str_replace(' ', '-', $keyword) . '%')
                    ->orWhere('slug', 'like', '%' . str_replace(' ', '-', $keyword) . '%');
            })
            ->orderBy('id', 'DESC')
            ->get();
        $keyword_posts = Post::where('type', '=', 'post')
            ->where('thumb', '!=', '')
            ->where(function ($query) {
                $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            ->where('title', 'like', '%' . $keyword . '%')
            ->orWhere('content', 'like', '%' . $keyword . '%')
            ->orWhere('slug', 'like', '%' . $keyword . '%')
            ->orWhere('slug', 'like', '%' . str_replace(' ', '-', $keyword) . '%')
            ->limit(5)
            ->get();
        $keyword_topics = Topic::where(function ($query) {
            $query->where('type', '=', 'q')->orWhere('type', '=', 'product');
        })
            ->orderBy('id', 'DESC')
            ->where('title', 'like', '%' . $keyword . '%')
            ->orWhere('content', 'like', '%' . $keyword . '%')
            ->limit(5)
            ->get();
        $keyword_users = User::orderBy('id', 'DESC')
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('username', 'like', '%' . $keyword . '%')
            ->orWhere('mobile', 'like', '%' . $keyword . '%')
            // ->orWhere('telephone', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->limit(5)
            ->get();

        $keyword_invoices = Invoice::orderBy('id', 'DESC')
            ->where('order_no', 'like', '%' . $keyword . '%')
            ->orWhere('customer_name', 'like', '%' . $keyword . '%')
            ->limit(10)
            ->get();
        if (Gate::allows('show_id_user')) {
            $user_id = Auth::guard('web')->user()->id;
            $keyword_invoices = Invoice::orderBy('id', 'DESC')
                ->where('created_by', '=', $user_id)
                ->orWhere('order_no', 'like', '%' . $keyword . '%')
                ->orWhere('customer_name', 'like', '%' . $keyword . '%')
                ->limit(10)
                ->get();
        }
        $keyword_dls_pdf = Download::orderBy('id', 'DESC')
            ->where('filename', 'like', '%' . $keyword . '%')
            ->orWhere('filename', 'like', '%' . str_replace(' ', '-', $keyword) . '%')
            ->where('type', '=', 'pdf')
            ->limit(10)
            ->get();
        $keyword_datasheets = Datasheet::orderBy('id', 'DESC')
            ->where('slug', 'like', '%' . $keyword . '%')
            ->orWhere('title', 'like', '%' . $keyword . '%')
            ->orWhere('sku', 'like', '%' . $keyword . '%')
            ->orWhere('sku', 'like', '%' . str_replace(' ', '-', $keyword) . '%')
            ->orWhere('slug', 'like', '%' . str_replace(' ', '-', $keyword) . '%')
            ->orWhere('content', 'like', '%' . $keyword . '%')
            ->limit(10)
            ->get();
        $data = [
            'keyword' => $keyword,
            'keyword_posts' => $keyword_posts,
            'keyword_products' => $keyword_products,
            'keyword_topics' => $keyword_topics,
            'keyword_users' => $keyword_users,
            'keyword_invoices' => $keyword_invoices,
            'keyword_menu' => $keyword_menu,
            'keyword_dls_pdf' => $keyword_dls_pdf,
            'keyword_datasheets' => $keyword_datasheets,
            'url_fetch' => $url_fetch
        ];
        return view('web.pages.ajax.fetch', $data);

    }
}
