<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Menu;
use App\Models\Company;
use App\Models\Post;
use App\Models\Download;
use App\Models\Category;
use App\Models\Seo;
use PDF;
use Response;

class PostController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (!Gate::allows('content_view')) {
            abort(401);
        }
        $total_posts = count(Post::select('id')->where('type', 'post')->get());
        $stat_publish_post = count(Post::select('id')->where('publish', 'on')->where('type', 'post')->get());
        $stat_draft_post = count(Post::select('id')->where('publish', 'draft')->where('type', 'post')->get());
        $posts = Post::where('thumb', '!=', '')
            ->where(function ($query) {
                $query->where('publish', '=', 'publish')->orWhere('publish', '=', 'on');
            })
            ->orderBy('id', 'DESC')
            ->get();
        if (Gate::allows('content_view')) {
            $posts = Post::orderBy('id', 'DESC')->get();
        }
        if ($posts) {
            return view('admin.pages.post.index', compact('posts', 'total_posts', 'stat_publish_post', 'stat_draft_post'));
        } else {
            abort(404);
        }
    }

    public function draft()
    {
        Artisan::call('ittelecom:rebuild-images');
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (Gate::allows('accountant_view') || Gate::allows('seller_view') || Gate::allows('sale_manage_view') || Gate::allows('customer_view')) {
            abort(401);
        }
        $posts = Post::where('thumb', '!=', '')->where('publish', '=', 'draft')->orderBy('id', 'DESC')->get();
        if (Gate::allows('content_view')) {
            $posts = Post::orderBy('id', 'DESC')->where('publish', '=', 'draft')->get();
        }
        if ($posts) {
            return view('admin.pages.post.draft', compact('posts'));
        } else {
            abort(404);
        }
    }

    public function create()
    {
        Artisan::call('ittelecom:rebuild-images');
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (Gate::allows('accountant_view') || Gate::allows('seller_view') || Gate::allows('sale_manage_view') || Gate::allows('customer_view')) {
            abort(401);
        }
        $category_blog = Menu::where('type', '=', 'post')->orderBy('id', 'ASC')->get();
        $gallary = Download::where('type', '=', 'post')->orderBy('id', 'DESC')->get();
        return view('admin.pages.post.create', compact('gallary', 'category_blog'));
    }

    public function store(Request $request)
    {
        Artisan::call('ittelecom:rebuild-images');
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        $this->validatePost($request);
        $order_no_last = Post::all()->last()->id + 1;
        $Post = new Post();
        $Post->title = $request->title;
        $Post->slug = urlencode(strtolower($request->slug));
        $Post->content = $request->input('content');
        $Post->publish = $request->input('publ');
        $Post->thumb = implode(",", request()->thumbl);
//        dd(request()->all());
//        $Post->menu_ids = implode(',', request()->catl);
        $Post->short_description = $request->input('short-description');
        $Post->created_at = now();
        $Post->updated_at = now();
        $Post->save();
        /// Save Category
        $illness_arr = $request->catl; // returns an array
        // return count($illness_arr);
        // return $illness_arr;
        if ($illness_arr) {
            for ($count = 0; $count < count($illness_arr); $count++) {
                $CategoryItem = new Category();
                $CategoryItem->no_id = $order_no_last;
                $CategoryItem->menu_ids = $request->input('catl.' . $count);
                $CategoryItem->type = 'post';
                $CategoryItem->save();
            }
        }
        cache()->flush();
        session()->flash('success', 'مقاله جدید اضافه شد.');
        return redirect()->route('admin.post.index');
    }

    public function show($id)
    {
        $category_menu = Menu::where('type', '=', 'post')->get();
        $post = Post::where('id', $id)->first();
        if ($post) {
            $post->visit();
            return view('web.pages.post.id', compact('category_menu', 'post'));
        } else {
            abort(404);
        }
    }

    public function edit(Post $post)
    {
        Artisan::call('ittelecom:rebuild-images');
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (Gate::allows('accountant_view') || Gate::allows('seller_view') || Gate::allows('sale_manage_view') || Gate::allows('customer_view')) {
            abort(401);
        }
        $users = User::orderBy('id', 'DESC')->get();
        $url = Post::where('id', $post->id)->value('slug');
        $category_menu = Menu::where('type', '=', 'post')->get();
        $category_blog = Menu::where('type', '=', 'post')->orderBy('id', 'ASC')->get();
        $categories = Category::where('no_id', '=', $post->id)->where('type', '=', 'post')->get();
        $gallary = Download::where('type', '=', 'post')->orderBy('id', 'DESC')->get();
        $id = $post->id;
        abort_if(empty($post), 404);
        return view('admin.pages.post.edit', compact('id', 'users', 'post', 'url', 'category_menu', 'category_blog', 'categories', 'gallary'));
    }

    public function update(Post $post)
    {
        Artisan::call('ittelecom:rebuild-images');
        cache()->flush();
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        // $this->validatePost($request);
        $postObject = Post::find($post->id);
        $postObject->title = request()->title;
        $slug = $post->slug;
        $postObject->slug = (request()->slug != $slug) ? urlencode(strtolower(request()->slug)) : request()->slug;
        $postObject->content = request()->input('content');
        $postObject->publish = request()->input('publ');
        $postObject->short_description = request()->input('short-description') ?? ' ';
        $postObject->updated_at = now();
        $postObject->thumb = request()->thumb;
        $postObject->save();
        $post_id = $post->id;
        if (request()->catl && sizeof(request()->catl) > 0) {
            for ($count = 0; $count < count(request()->catl); $count++) {
                $CategoryItem = new Category();
                $CategoryItem->no_id = $post->id;
                $CategoryItem->menu_ids = request()->input('catl.' . $count);
                $CategoryItem->type = 'post';
                $CategoryItem->save();
            }
        }
        session()->flash('success', 'مقاله بروزرسانی شد.');
        return back();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }

    protected function validatePost(Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'slug' => 'required',
        ], [
            'title.required' => 'لطفا " موضوع مقاله " را وارد کنید. ',
            'slug.required' => 'لطفا " آدرس مقاله " را وارد کنید. ',
        ]);
    }
}
