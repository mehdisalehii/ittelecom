<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('admin_view') ) {
            abort(401);
        }
        $roles = Role::all(); // ->sortByDesc("id");
        $users = User::orderBy('id','DESC')->get();
        return view('admin.pages.users.index', compact('users','roles'));
    }
    public function create()
    {
        if (! Gate::allows('admin_panel')) {
            return abort(404);
        }

        if (! Gate::allows('admin_view') ) {
            abort(401);
        }

        $roles = Role::get()->pluck('name', 'name');
        $roles_all = Role::all();
        return view('admin.pages.users.create', compact('roles','roles_all'));
    }
    public function store(Request $request)
    {

        if (! Gate::allows('admin_panel')) {
            return abort(404);
        }

        $this->validateUser($request);

        $colors = array( '#acb','#abe','#cba','#baf','#eea','#cab' );

        // $user = User::create($request->all());
        $user = new User();
        $user->name = $request->name ;
        $user->username = $request->username ;
        $user->email = $request->email ;
        $user->mobile = $request->mobile ;
        $user->password = Hash::make(md5($request->password)) ;
        $user->photo = $colors[array_rand($colors)] ;
        $user->save();

        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        session()->flash('success', 'کاربر جدید اضافه شد.');
        return redirect()->route('admin.users.index');
    }
    public function edit(User $user)
    {
        if (! Gate::allows('admin_panel')) {
            return abort(404);
        }

        if (! Gate::allows('admin_view') ) {
            abort(401);
        }

        $roles = Role::get()->pluck('name', 'name');
        $roles_all = Role::all();

        return view('admin.pages.users.edit', compact('user', 'roles' ,'roles_all'));
    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('admin_panel')) {
            return abort(404);
        }

        // $user->update($request->all());
        $user = User::find($id);
        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->mobile = $request->mobile ;
        $user->is_email_verified = $request->is_email_verified ;
        $user->save();

        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);
        session()->flash('success', 'ویرایش کاربر بروزرسانی شد.');
        return back();
    }
    public function passwordShow(Request $request, $id)
    {
        $user = User::find($id);
        return view('admin.pages.users.password', compact('user'));
    }
    public function passwordUpdate(Request $request, $id)
    {
        if ( $request->password_confirm != $request->password ) {
            session()->flash('error', 'رمزعبور یکسان نمی‌باشد.');
            return back();
        }

        $user = User::find($id);
        if ($request->password) {
            $user->password = Hash::make(md5($request->password)) ;
        }
        $user->save();
        session()->flash('success', 'تغییر رمز بروزرسانی شد.');
        return back();
    }

    public function show(User $user)
    {
        return abort(404);
        // if (! Gate::allows('admin_panel')) {
        //     return abort(404);
        // }
        // $user->load('roles');
        // return view('admin.pages.users.show', compact('user'));
    }
    public function destroy(User $user)
    {
        abort(401);
        if (! Gate::allows('admin_panel')) {
            return abort(404);
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('admin_panel')) {
            return abort(404);
        }
        User::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

    protected function validateUser(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users',
            'username' => 'required|max:100|unique:users',
            // 'password' => 'required|min:6|confirmed',
        ],[
            'name.required' => 'لطفا نام را وارد کنید.',
            'email.required' => 'لطفا ایمیل را وارد کنید.',
            'email.email' => 'لطفا ایمیل را درست (با @) وارد کنید.',
            'username.required' => 'لطفا نام کاربری را وارد کنید.',
            'password.required' => 'لطفا رمز عبور را وارد کنید.',
            // 'password.confirmed' => 'لطفا تاییدیه رمز را درست وارد کنید.',
            // 'password.min' => 'لطفا رمز عبور را حداکثر ۶ تا کاراکتر وارد کنید.',
        ]);

    }

}
