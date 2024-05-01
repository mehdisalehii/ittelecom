<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\Menu;
use App\Models\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RedirectController extends \App\Http\Controllers\Controller
{
    public function check($url)
    {
        $redirect = Redirect::where('slug', $url)->first();
        $post = Post::where('slug', urlencode($url))->where('type', '=', 'post')->first();
        $amp = str_replace('/amp', '', $url);
        $post_amp = Post::where('slug', urlencode($amp))->where('type', '=', 'post')->first();
        if ($post) {
            return redirect('blog/' . $post->slug, 301);
        } else if ($post_amp) {
            return redirect('blog/' . $post_amp->slug . '/amp', 301);
        } else if ($url && $redirect) {
            return redirect($redirect->redirect_to, 301);
        } else {
            abort(404);
        }
    }

    public function index()
    {

        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }

        $redirects = Redirect::orderBy('id', 'DESC')->get();
        return view('admin.pages.redirect.index', compact('redirects'));

    }

    public function create()
    {
        if (!Gate::allows('admin_panel')) {
            return abort(401);
        }
        return view('admin.pages.redirect.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }

        if (!Gate::allows('sale_create')) {
            abort(401);
        }

        $this->validateRedirect($request);

        $redirect = new Redirect();
        $redirect->slug = $request->slug;
        $redirect->type = $request->type;
        $redirect->redirect_to = $request->redirect_to;
        $redirect->save();

        session()->flash('success', 'لینک جدید اضافه شد.');

        return redirect()->route('admin.redirect.index');
    }

    public function show(Redirect $redirect)
    {
        return abort(404);
    }

    public function edit($id)
    {
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }

        if (!Gate::allows('sale_edit')) {
            abort(401);
        }

        $redirect = Redirect::where('id', $id)->first();

        if ($redirect) {
            return view('admin.pages.redirect.edit', compact('redirect'));
        }

        abort(401);

    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }

        if (!Gate::allows('sale_create')) {
            abort(401);
        }

        $this->validateRedirect($request);

        $redirect = Redirect::find($id);
        $redirect->slug = $request->slug;
        $redirect->type = $request->type;
        $redirect->redirect_to = $request->redirect_to;
        $redirect->save();

        session()->flash('success', 'لینک بروزرسانی شد.');
        return back();
    }

    public function destroy(Request $request, $id)
    {
        abort(401);
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }

        if (!Gate::allows('sale_delete')) {
            abort(401);
        }

        $redirect = Redirect::find($id);
        if (!is_null($redirect)) {
            $redirect->delete();
        }
        session()->flash('delete', 'کالا موردنظر حذف شد.');
        return redirect()->route('admin.redirect.index');
    }

    protected function validateRedirect(Request $request)
    {
        $request->validate([
            'slug' => 'required|max:150',
            'redirect_to' => 'required',
        ], [
            'slug.required' => 'لطفا " پارت نامبر " را وارد کنید. ',
            'redirect_to.required' => 'لطفا " اسلاگ " را وارد کنید. ',
        ]);
    }

    public function notFound()
    {
        abort(404);
    }
}
