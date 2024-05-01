<?php

namespace App\Http\Controllers\AMP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Post;
use App\Models\User;

class PostController extends \App\Http\Controllers\Controller
{
    public function blog(Request $request)
    {
        return redirect('/blog');
        $pageNumber = $request->get('page');
        $paginationSize = 5;
        $data = cache()->remember('aria.controllers.web.post.blog.posts.' . $pageNumber, 518400, function () use ($pageNumber, $paginationSize) {
            $category_blog = cache()->remember('aria.controllers.web.category_blog', 518400, function () {
                return Menu::where('type', 'post')->orderBy('id', 'ASC')->get();
            });
            $posts = Post::where('type', 'post')
                ->where('thumb', '!=', '')
                ->where(function ($query) {
                    $query->where('publish', 'publish')->orWhere('publish', 'on');
                })
                ->orderBy('created_at', 'DESC')->skip(6)->paginate($paginationSize, ['*'], 'page', $pageNumber);
            $posts_visit = Post::popularMonth()->where('type', 'post')->where('thumb', '!=', '')->where('publish','on')->limit(10)->get();
            $slideshow = Post::where('type', 'post')->where('thumb', '!=', '')->where('publish','on')->orderBy('created_at', 'DESC')->limit(6)->get();
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
        abort_if(empty($data['posts']), 404);
        return view('amp.blog', $data);
    }

    public function post($url)
    {
        $post = cache()->remember('aria.controllers.web.post.show.post.' . $url, 518400, function () use ($url) {
            return Post::where('slug', urlencode($url))
                ->where('type', '=', 'post')
                ->where('thumb', '!=', '')
                ->where(function ($query) {
                    $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
                })
                ->first();
        });
        abort_if(empty($post), 404);
        $category_blog = cache()->remember('aria.controllers.web.category_blog', 518400, function () {
            return Menu::where('type', 'post')->orderBy('id', 'ASC')->get();
        });
        $data = array(
            'category_blog' => $category_blog,
            'url' => $url,
            'post' => $post
        );
        $post->visit();
        return view('amp.pages.post.id', $data);
    }
}
