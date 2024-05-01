<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// use Kavenegar;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Mail;
use Illuminate\Support\Facades\Gate;

class VerifyAccountController extends \App\Http\Controllers\Controller
{

    public function verifyAccountEmail($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
        $message = 'متاسفم ، توکن شما موجود نمی باشد!';
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "حساب کاربری (ایمیل) شما فعالسازی شد. میتوانید وارد شوید!";
            } else {
                $message = "قبلا حساب کاربری (ایمیل) شما فعالسازی شده است!";
            }
        }
        return redirect()->route('login')->with('message', $message);
    }

    public function showVerifyEmail()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('content_user_view') ) {
            abort(401);
        }

        $user = Auth::user();
        $email = $user->email;

        return view('emails.index' , compact('email') );
    }

    public function verifyAgainEmail(Request $request)
    {

        $user = Auth::user();
        $user_id = $user->id;
        $username = $user->username;
        $email = $user->email;

        $token = Str::random(64);

        $UserVerify = UserVerify::find($user_id);
        $UserVerify->token = $token;
        $UserVerify->save();

        Mail::send('emails.send', [ 'username' => $username ,'email' => $email , 'token' => $token ], function($message) use($user){
            $message->to($user->email)
            ->subject('فعالسازی مجدد حساب ' . 'آی‌تی‌تلکام' );
        });

        // return redirect()->route('verify')->with('message', 'fgh');
        session()->flash('success', 'به ایمیل صندوق پستی یا اسپم شما ارسال شد.');
        return back();

    }

}
