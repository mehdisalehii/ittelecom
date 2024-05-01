<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

// use Kavenegar;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Mail;
use Auth;

class RegisterController extends \App\Http\Controllers\Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        if ( captcha_check($request->captcha) == false ) {
            // return back()->withErrors('کد تاییدیه امنیتی اشتباه می‌باشد.');
            return back()->withErrors(['captcha' => 'کد تاییدیه امنیتی اشتباه می‌باشد.']);
        }

        $colors = array( '#acb','#abe','#cba','#baf','#eea','#cab' );

        $user = new User();
        $user->username = $request->username ;
        $user->name = ucfirst($request->username) ;
        // $user->mobile = $request->mobile ;
        $user->email = $request->email ;
        $user->photo = $colors[array_rand($colors)] ;
        $user->password = Hash::make(md5($request->password)) ;
        $user->save();

        $user->assignRole('customer');

        $token = Str::random(64);
        UserVerify::create([
            'user_id' => $user->id,
            'token' => $token
        ]);
        Mail::send('emails.send', [ 'username' => $user->username , 'token' => $token ], function($message) use($request){
            $message->to($request->email)
            ->subject('فعالسازی حساب ' . 'آی‌تی‌تلکام' );
        });

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        // Auth::logout();
        // return $request->wantsJson() ? new JsonResponse([], 201) : redirect($this->redirectPath());
        return $request->wantsJson() ? new JsonResponse([], 201) : redirect(route('verify'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'username' => 'required|regex:/^[a-zA-Z]+$/u|string|max:255|unique:users',
            'username' => 'required|regex:/^[a-z]+$/u|string|max:255|unique:users',
            // 'mobile' => 'required|string|min:11|max:11',
            // 'mobile' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password',
            'captcha' => 'required'
        ],
        [
            'username.required' => 'نام کاربری تان را وارد کنید.',
            'username.regex' => 'کاراکتر حرف مجاز (a-z) را وارد کنید.',
            'username.unique' => 'نام کاربری تان در سیستم ثبت شده است.',
            // 'mobile.required' => 'شماره موبایل تان را وارد کنید.',
            // 'mobile.min' => 'شماره موبایل تان به صورت یازده رقمی مثال: 09121234567 را وارد کنید',
            // 'mobile.max' => 'شماره موبایل تان به صورت یازده رقمی مثال: 09121234567 را وارد کنید',
            'email.required' => 'ایمیل تان را وارد کنید.',
            'email.unique' => 'ایمیل تان در سیستم ثبت شده است.',
            'email.email' => 'ایمیل تان را درست تایپ کنید.',
            'password.required' => 'رمز عبور کاربری تان را وارد کنید.',
            'password.max' => 'حداکثر رمز عبور 6 کاراکتر می باشد.',
            'password.min' => 'حداقل رمز عبور 6 کاراکتر می باشد.',
            'confirm_password.required' => 'رمز عبور تاییدیه تان را وارد کنید.',
            'confirm_password.same' => 'رمز عبور یکسان نمی باشد.',
            'captcha.required' => 'کد تاییدیه امنیتی را وارد کنید.',
        ]);
    }


}
