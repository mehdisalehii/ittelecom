<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Captcha;

class CaptchaController extends \App\Http\Controllers\Controller
{

    public function reloadCaptcha()
    {
        // return 4545;
        // return response()->json(['captcha'=> captcha_img()]);
        // $captcha = Captcha::img();
        // $captcha = Captcha::img('inverse');
        $captcha = Captcha::src('default');
        return $captcha;
    }

}
