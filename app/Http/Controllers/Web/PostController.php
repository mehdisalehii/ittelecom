<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use App\Models\Menu;
use App\Models\User;
use App\Models\Post;
use App\Models\Redirect;
use App\Models\Category;

class PostController extends \App\Http\Controllers\Controller
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
//        $ip_check = \App\Models\Stat::where('ip', $ip)->whereDate('created_at', date('Y-m-d'))->first();
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

    public function blog(Request $request)
    {
        $pageNumber = $request->get('page');
        $paginationSize = 5;
        $data = cache()->remember('aria.controllers.web.post.blog.posts.' . $pageNumber, 518400, function () use ($pageNumber, $paginationSize) {
            $category_blog = cache()->remember('aria.controllers.web.post.show.category_blog', 518400, function () {
                return Menu::where('type', 'post')->orderBy('id', 'ASC')->get();
            });
            $slideshow = Post::where('type', 'post')->where('thumb', '!=', '')->where('publish', 'on')->orderBy('created_at', 'DESC')->limit(6)->get();
            $postsQuery = Post::where('type', 'post')
                ->where('thumb', '!=', '')
                ->where(function ($query) {
                    $query->where('publish', 'publish')->orWhere('publish', 'on');
                })
                ->orderBy('created_at', 'DESC');
            if ($pageNumber < 2) {
                $postsQuery = $postsQuery->whereNotIn('id', $slideshow->pluck('id'));
            }
            $posts = $postsQuery->paginate($paginationSize, ['*'], 'page', $pageNumber);
            $posts_visit = Post::popularMonth()->where('type', 'post')->where('thumb', '!=', '')->where('publish', 'on')->limit(10)->get();
            $reading = Post::where('type', 'post')->where('thumb', '!=', '')->where(function ($query) {
                $query->where('publish', 'publish')->orWhere('publish', 'on');
            })->orderBy('created_at', 'DESC')->limit(15)->get();
            $users = User::orderBy('id', 'DESC')->get();
            $data = array(
                'category_blog' => $category_blog,
                'posts' => $posts,
                'posts_visit' => $posts_visit,
                'slideshow' => $slideshow,
                'reading' => $reading,
                'users' => $users,
            );
            return $data;
        });

        $data['mobile_pagination_margin'] = 4;
        $first_or_last_pagination_margin = 5;
        if ($data['posts']->currentPage() < $first_or_last_pagination_margin || $data['posts']->currentPage() > ($data['posts']->lastPage() - $first_or_last_pagination_margin)) {
            $data['mobile_pagination_margin'] = 5;
        }

        return view('web.pages.post.blog', $data);
    }

    public function redirect($url)
    {
        $post = Post::where('slug', urlencode($url))
            ->where('type', 'post')
            ->where('thumb', '!=', '')
            ->where(function ($query) {
                $query->where('publish', 'publish')->orWhere('publish', 'on');
            })
            ->first();
        if ($post) {
            return redirect('/blog' . '/' . $url);
        }

    }

    public function show($url)
    {
        $post = cache()->remember('aria.controllers.web.post.show.post.' . $url, 518400, function () use ($url) {
            return Post::where('slug', urlencode($url))
                ->where('type', 'post')
                ->where('thumb', '!=', '')
                ->where(function ($query) {
                    $query->where('publish', 'publish')->orWhere('publish', 'on');
                })
                ->first();
        });
        if(empty($post)){
            $product = Product::where('thumb', '!=', '')
                ->where(function ($query) {
                    $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
                })
                ->where('slug', urlencode($url))->first();
            if($product){
                return redirect('shop/' . $product->slug);
            }
            abort_if(empty($post), 404);
        }
        $category_blog = cache()->remember('aria.controllers.web.show.category_blog', 518400, function () {
            return Menu::where('type', 'post')->orderBy('id', 'ASC')->get();
        });
        $categories = cache()->remember('aria.controllers.web.show.categories.id' . $post->id, 518400, function () use ($post) {
            return Category::where('no_id', $post->id)->where('type', 'post')->get();
        });
        if (Gate::allows('content_view')) {
            $post = Post::where('type', 'post')->where('slug', urlencode($url))->first();
        }
        $related_posts = cache()->remember('aria.controllers.web.related_posts.id' . $post->id, 518400, function () use ($post) {
            return Post::
            where('type', '=', 'post')
                ->where(function ($query) {
                    $query->where('publish', 'publish')->orWhere('publish', 'on');
                })
                ->where(function ($query) use ($post) {
                    $categories = explode(',', $post->menu_ids);
                    if (@$categories && sizeof($categories) > 0) {
                        foreach ($categories as $categoryId) {
                            !empty($categoryId) && $query->orWhereRaw("find_in_set($categoryId, menu_ids)");
                        }
                    }
                })
                ->where('thumb', '!=', '')
                ->inRandomOrder()
                ->limit(4)->get();
        });
        $pageNumber = 1;
        $paginationSize = 10;
        $data = cache()->remember('aria.controllers.web.post.blog.posts.' . $post->id, 518400, function () use ($pageNumber, $paginationSize, $post) {
            $category_blog = cache()->remember('aria.controllers.web.category_blog', 518400, function () {
                return Menu::where('type', 'post')->orderBy('id', 'ASC')->get();
            });
            $posts = Post::where('type', 'post')
                ->where('thumb', '!=', '')
                ->where(function ($query) {
                    $query->where('publish', 'publish')->orWhere('publish', 'on');
                })
                ->orderBy('created_at', 'DESC')->skip(6)->paginate($paginationSize, ['*'], 'page', $pageNumber);
            $posts_visit = Post::popularMonth()->where('type', 'post')->where('thumb', '!=', '')->where('publish', 'on')->limit(10)->get();
            $slideshow = Post::where('type', 'post')->where('thumb', '!=', '')->where('publish', 'on')->orderBy('created_at', 'DESC')->limit(6)->get();
            $reading = Post::where('type', 'post')->where('thumb', '!=', '')->where(function ($query) {
                $query->where('publish', 'publish')->orWhere('publish', 'on');
            })->orderBy('created_at', 'DESC')->limit(15)->get();
            $users = User::orderBy('id', 'DESC')->get();
            $categories = explode(',', $post->menu_ids);
            $relatedProductsQuery = Product::where('publish', '=', 'on')
                ->where('thumb', '!=', '')
                ->where(function($inner_query) use ($categories) {
                    if (@$categories && sizeof($categories) > 0) {
                        foreach ($categories as $categoryId) {
                            !empty($categoryId) && $inner_query->orWhereRaw("find_in_set($categoryId, menu_ids)");
                        }
                    }
                })
                ->orderBy('id', 'DESC');
            $relatedProducts = $relatedProductsQuery
                ->limit(10)
                ->get();
            if($relatedProducts->count() ==0){
                $relatedProducts = Product::where('publish', '=', 'on')
                    ->where('thumb', '!=', '')
                    ->take(10)
                    ->inRandomOrder()
                    ->get();
            }
            $data = array(
                'relatedProducts' => $relatedProducts,
                'category_blog' => $category_blog,
                'posts' => $posts,
                'posts_visit' => $posts_visit,
                'slideshow' => $slideshow,
                'reading' => $reading,
                'users' => $users,
            );
            return $data;
        });
        $data['category_blog'] = $category_blog;
        $data['categories'] = $categories;
        $data['url'] = $url;
        $data['post'] = $post;
        $data['related_posts'] = $related_posts;
        $post->visit();
        return view('web.pages.post.id', $data);

        // $table->timestamp('published_at');
        // $posts = Post
        //     ::where('published_at', '<', now())
        //     ->orderByDesc('published_at')
        //     ->paginate(50);


        // if($url){
        //     if( $redirect ) {
        //         return redirect($redirect->redirect_to);
        //     } else {
        //     }
        // }
        // return false;
    }

    public function preview($url)
    {
        $post = Post::where('slug', urlencode($url))->first();
        abort_if(empty($post), 404);
        $category_blog = Menu::where('type', 'post')->orderBy('id', 'ASC')->get();
        $categories = Category::where('no_id', $post->id)->where('type', 'post')->get();
        if (Gate::allows('content_view')) {
            $post = Post::where('type', 'post')->where('slug', urlencode($url))->first();
        }
        $users = User::orderBy('id', 'DESC')->get();
        $related_posts = Post::where('type', '=', 'post')
            ->where(function ($query) {
                $query->where('publish', 'publish')->orWhere('publish', 'on');
            })
            ->where(function ($query) use ($post) {
                $categories = explode(',', $post->menu_ids);
                if (!empty($categories)) {
                    foreach ($categories as $categoryId) {
                        if(!empty($categoryId)){
                            $query->orWhereRaw("find_in_set($categoryId,menu_ids)");
                        }
                    }
                }
            })
            ->where('thumb', '!=', '')
            ->inRandomOrder()
            ->limit(4)->get();
        $post->visit();
        return view('web.pages.post.id', compact('category_blog', 'categories', 'users', 'url', 'post', 'related_posts'));
    }

}
