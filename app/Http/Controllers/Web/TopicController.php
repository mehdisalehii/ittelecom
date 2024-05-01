<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class TopicController extends \App\Http\Controllers\Controller
{
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

    public function forum() {
        $category_forum = Menu::where('type', '=', 'forum')->orderBy('id', 'ASC')->limit(6)->get();
        $topic_last_q = Topic::where('type', '=', 'q')->where('publish', '=', 'on')->orderBy('id', 'DESC')->limit(5)->get();
        $forum_view_q = Topic::where('type', '=', 'q')->where('publish', '=', 'on')->orderBy('id', 'DESC')->limit(10)->get();
        $topic_visited = Topic::where('type', '=', 'q')->where('publish', '=', 'on')->orderBy('id', 'DESC')->limit(10)->get();
        $forum_cats_index = Topic::where('type', '=', 'q')->where('publish', '=', 'on')->orderBy('id', 'DESC')->get();
        $users = User::orderBy('id', 'DESC')->limit(16)->get();
        $roles = Role::all();
        $data = [
            'countQuestions' => Topic::where('answer', 0)->count(),
            'countAnswers' => Topic::where('answer', 1)->count(),
            'countUsers' => User::count(),
        ];
        return view('web.pages.forum.index', compact('category_forum', 'users', 'roles', 'topic_visited', 'forum_cats_index', 'topic_last_q', 'forum_view_q', 'data'));
    }

    public function forumProduct()
    {
        $category_forum = Menu::where('type', '=', 'forum')->orderBy('id', 'ASC')->get();
        $forum_view_products = Topic::where('type', '=', 'product')->where('publish', '=', 'on')->orderBy('id', 'DESC')->limit(10)->get();
        return view('web.pages.forum.index', compact('category_forum', 'forum_view_products'));
    }

    public function forumUsers()
    {
        $category_forum = Menu::where('type', '=', 'forum')->orderBy('id', 'ASC')->get();
        return view('web.pages.forum.index', compact('category_forum'));
    }

    public function topic($url)
    {

        $topic = Topic::where('slug', urlencode($url))
            ->where(function ($query) {
                $query->where('type', '=', 'q')->orWhere('type', '=', 'product');
            })
            ->where(function ($query) {
                $query->where('publish', '=', 'on')->orWhere('publish', '=', 'on');
            })
            ->first();
        abort_if(empty($topic->content), 404);
        $posts = Topic::whereParentId($topic->id)->orWhere('id', $topic->id)->orderBy('created_at', 'asc')->get();
        $category = Menu::whereId(explode(',', $topic->menu_ids)[0])->where('type', '=', 'forum')->first();
        return view('web.pages.forum.topics.replies', compact('posts', 'category'));
    }

    public function forumCategory($url)
    {

        $category = Menu::where('slug', urlencode($url))->where('type', '=', 'forum')->first();
        $category_forum = Menu::where('type', '=', 'forum')->orderBy('id', 'ASC')->get();

        $posts_cat = 'forum/cats/';
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
        $s1 = '';
        $s2 = '';
        $s3 = '';
        $s4 = '';
        $cat_id = '0';
        $menu_main = Menu::where('type', '=', 'forum')->where('slug', '=', $last_url)->orderBy('id', 'ASC')->get();
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

        $cats_forum = Topic::where('type', '=', 'q')
            ->where(function ($query) {
                $query->where('publish', '=', 'on')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            ->whereRaw("find_in_set( $cat_id ,menu_ids)")
            ->skip(0)->take($limit)
            ->get();

        $cats_forum_products = Topic::where('type', '=', 'product')
            ->where(function ($query) {
                $query->where('publish', '=', 'on')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            ->whereRaw("find_in_set( $cat_id ,menu_ids)")
            ->skip(0)->take($limit)
            ->get();

        $users = User::orderBy('id', 'DESC')->get();

        $topic_visited = Topic::where('type', '=', 'q')->where('publish', '=', 'on')->orderBy('id', 'DESC')->limit(5)->get();
        $topics_last = Topic::where('type', '=', 'q')->where('publish', '=', 'on')->orderBy('id', 'DESC')->limit(5)->get();
        $products_last = Topic::where('type', '=', 'product')->where('publish', '=', 'on')->orderBy('id', 'DESC')->limit(10)->get();

        $forum_cats_index = Topic::where('type', '=', 'q')->where('publish', '=', 'on')->orderBy('id', 'DESC')->get();

        $data = array(
            'category' => $category,
            'cats_forum' => $cats_forum,
        );

        if ($category) {
            return view('web.pages.forum.topics.index', $data);
        } else {
            abort(404); // return view('errors.404' , $data );
        }

    }

    public function forumCategoryProduct($url)
    {

        $category = Menu::where('slug', urlencode($url))->where('type', '=', 'forum')->first();
        $category_forum = Menu::where('type', '=', 'forum')->orderBy('id', 'ASC')->get();
        $posts_cat = 'forum/products/';
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
        $s1 = '';
        $s2 = '';
        $s3 = '';
        $s4 = '';
        $cat_id = '0';
        $menu_main = Menu::where('type', '=', 'forum')->where('slug', '=', $last_url)->orderBy('id', 'ASC')->get();
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

        $cats_product_forum = Topic::where('type', '=', 'product')
            ->where(function ($query) {
                $query->where('publish', '=', 'on')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            ->whereRaw("find_in_set( $cat_id ,menu_ids)")
            ->skip(0)->take($limit)
            ->get();

        $users = User::orderBy('id', 'DESC')->get();

        $cats_forum = Topic::where('type', '=', 'q')
            ->where(function ($query) {
                $query->where('publish', '=', 'on')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            ->whereRaw("find_in_set( $cat_id ,menu_ids)")
            ->skip(0)->take($limit)
            ->get();

        $cats_forum_products = Topic::where('type', '=', 'product')
            ->where(function ($query) {
                $query->where('publish', '=', 'on')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            ->whereRaw("find_in_set( $cat_id ,menu_ids)")
            ->skip(0)->take($limit)
            ->get();

        $users = User::orderBy('id', 'DESC')->get();

        $topic_visited = Topic::where('type', '=', 'q')->where('publish', '=', 'on')->orderBy('id', 'DESC')->limit(5)->get();
        $topics_last = Topic::where('type', '=', 'q')->where('publish', '=', 'on')->orderBy('id', 'DESC')->limit(5)->get();
        $products_last = Topic::where('type', '=', 'product')->where('publish', '=', 'on')->orderBy('id', 'DESC')->limit(10)->get();

        $forum_cats_index = Topic::where('type', '=', 'q')->where('publish', '=', 'on')->orderBy('id', 'DESC')->get();

        $data = array(
            'category_forum' => $category_forum,

            'cat_id' => $cat_id,
            'last_url' => $last_url,

            'users' => $users,
            'category' => $category,
            'cats_forum' => $cats_forum,
            'cats_forum_products' => $cats_forum_products,
            'topic_visited' => $topic_visited,
            'products_last' => $products_last,
            'topics_last' => $topics_last,
            'url' => $url,
            'cats_product_forum' => $cats_product_forum,
            'forum_cats_index' => $forum_cats_index,

        );

        if ($category) {
            return view('web.pages.category.id_forumproduct', $data);
        } else {
            abort(404); // return view('errors.404' , $data );
        }

    }

    function submitNewReplyInTopic(Topic $topic, Request $request)
    {
        abort_if(empty($request->reply), 400);
        abort_if(empty(\Auth::id()), 401);
        $topic = Topic::create([
            'parent_id' => $topic->id,
            'comment_parent_id' => $topic->id,
            'slug' => $topic->slug,
            'title' => 'پاسخ به: ' . $topic->title,
            'content' => $request->reply,
            'author_id' => \Auth::id(),
            'cat' => $topic->menu_ids,
            'tag' => $topic->tag,
            'answer' => 1,
            'vote' => 0,
            'view' => 0,
            'robots' => null,
            'type' => $topic->type,
            'sku' => $topic->sku,
            'number' => $topic->number,
            'brand' => $topic->brand,
            'price' => $topic->price,
            'redirect' => $topic->redirect,
            'status' => $topic->status,
            'publish' => $topic->publish,
        ]);
        $topic->save();
        return back();
    }

    function createNewTopic(Menu $menu, Request $request)
    {
        $forum = $menu;

        abort_if(empty($request->subject), 400);
        abort_if(empty($request->body), 400);
        abort_if(empty(\Auth::id()), 401);
        $topic = Topic::create([
            'parent_id' => $forum->id,
            'comment_parent_id' => $forum->id,
            'slug' => Str::slug($request->subject),
            'title' => $request->subject,
            'content' => $request->body,
            'author_id' => \Auth::id(),
            'cat' => $forum->id,
            'tag' => null,
            'answer' => 0,
            'vote' => 0,
            'view' => 0,
            'robots' => null,
            'type' => 'q',
            'sku' => null,
            'number' => 0,
            'brand' => null,
            'price' => 0,
            'redirect' => null,
            'status' => 0,
            'publish' => 'on',
        ]);
        $topic->save();
        return back();
    }

}
