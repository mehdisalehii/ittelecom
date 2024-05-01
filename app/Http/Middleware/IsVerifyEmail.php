<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
    */
    public function handle(Request $request, Closure $next)
    {
        // if (!Auth::user()->is_email_verified) {
            // auth()->logout();
            // return 1233;
            // return redirect()->route('login')
                    // ->with('message', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        //   }


        // $user = $verifyUser->user;
        // if(!$user->is_email_verified) {
        //     $verifyUser->user->is_email_verified = 1;
        //     $verifyUser->user->save();
        //     $message = "حساب کاربری (ایمیل) شما فعالسازی شد. میتوانید وارد شوید!";
        // } else {
        //     $message = "قبلا حساب کاربری (ایمیل) شما فعالسازی شده است!";
        // }

        if ( Auth::user()->is_email_verified == 0 ) {
            return redirect()->route('verify');
        }

        return $next($request);
    }
}