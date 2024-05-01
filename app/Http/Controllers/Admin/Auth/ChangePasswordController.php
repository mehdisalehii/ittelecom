<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Validator;

class ChangePasswordController extends \App\Http\Controllers\Controller
{

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Where to redirect users after password is changed.
     *
     * @var string $redirectTo
     */
    protected $redirectTo = '/change_password';

    /**
     * Change password form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showChangePasswordForm()
    {
        $user = Auth::getUser();
        return view('admin.auth.change_password', compact('user'));
    }

    /**
     * Change password.
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $user = Auth::getUser();
        $this->validator($request->all())->validate();
        if (Hash::check(md5($request->current_password), $user->password)) {
            // $user->password = $request->get('new_password');
            $user->password = Hash::make(md5($request->new_password));
            $user->save();
            session()->flash('success', 'تغییر رمز بروزرسانی شد.');
            return back();
        } else {
            return redirect()->back()->withErrors('رمزعبور یکسان نمی‌باشد.');
        }
    }

    /**
     * Get a validator for an incoming change password request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'current_password' => 'required|min:6',
            'new_password' => 'required|confirmed',
        ],[
            'current_password.min' => 'لطفا حداقل ۶ تا کاراکتر وارد کنید.',  
            'current_password.required' => 'لطفا رمز عبور فعلی را وارد کنید.',  
            'new_password.required' => 'لطفا رمز عبور جدید را وارد کنید.',  
            'new_password.confirmed' => 'رمزعبور یکسان نمی‌باشد.', 
        ]);
    }
}
