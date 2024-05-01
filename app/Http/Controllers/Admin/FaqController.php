<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

class FaqController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $categories = Menu::with('faqs')->orderBy('id', 'ASC')->get();
        return view('admin.pages.faq.index')->with('categories', $categories);
//        return [11111];
    }

    public function create()
    {
        return ['create'];
    }

    public function store(Request $request)
    {
        abort_if(empty(auth()->id()), 401); // unauthorized
        $subjects = $request->input('subject');
        $bodies = $request->input('body');
        DB::transaction(function () use ($request, $subjects, $bodies) {
            FAQ::where([
                'menu_id' => $request->input('category'),
            ])->delete();
            foreach ($subjects as $key => $subject) {
                if(!empty($subject) && !empty($bodies[$key])) {
                    FAQ::create([
                        'subject' => trim(@$subject),
                        'body' => trim(@$bodies[$key]),
                        'menu_id' => $request->input('category'),
                        'user_id' => auth()->id(),
                    ]);
                }
            }
        });
        session()->flash('success', 'ثبت شد.');
        return back();
    }

    public function edit(Post $post)
    {
        return ['edit'];
    }

    public function update(Post $post)
    {
        return ['update'];
    }

    public function destroy(Request $request, $id)
    {
        return ['destroy'];
    }
}
