<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Post;
use App\Models\Product;
use App\Models\Topic;


// use Kavenegar;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Mail;

/// ghff

use View;

class HomeController extends \App\Http\Controllers\Controller
{
    protected function Stat()
    {
//        $ip = \Request::ip();
//        $ip_check = \App\Models\Stat::where('ip','=',$ip)->whereDate('created_at','=',date('Y-m-d'))->first();
//        if (! $ip_check ){
//            $stat = new \App\Models\Stat();
//            $stat->ip =  \Request::ip() ;
//            $data = \Location::get($ip);
//            if($data){
//                $stat->country =  $data->countryName.','.$data->regionName ;
//            } else {
//                $stat->country = 'Local';
//            }
//            $stat->save();
//        }
    }

    public function home()
    {
//        \Log::debug('===================================');
//        \Log::debug(\App::isProduction());
//        \Log::debug($_SERVER['HTTP_USER_AGENT']);
//        \Log::debug(isset($_SERVER['HTTP_USER_AGENT']));
//        \Log::debug(\Illuminate\Support\Str::contains($_SERVER['HTTP_USER_AGENT'], ['ahref', 'mediapartners', 'spider', 'slurp', 'bot', 'crawl', 'google']));
//        \Log::debug(\App::isProduction() &&
//            (
//                !isset($_SERVER['HTTP_USER_AGENT']) ||
//                !\Illuminate\Support\Str::contains($_SERVER['HTTP_USER_AGENT'], ['ahref', 'mediapartners', 'spider', 'slurp', 'bot', 'crawl', 'google'])
//            ));
        $menus = Menu::all();
        $products = Product::where('publish', '=', 'on')->where('thumb', '!=', '')->orderBy('id', 'DESC')->get();
        // $widget_main_category = WidgetMainCategory::where('public','=','on')->orderBy('id')->get();
        $widget_main_category = [
            [
                'id' => '1',
                'title' => 'سوییچ شبکه صنعتی، مدیریتی و PoE',
                'slug' => 'products/cat/ethernet-switches',
                'thumb' => 'switch.svg',
                'cat' => '1',
            ],
            [
                'id' => '2',
                'title' => 'مدیا کانورترها و مبدل ویدیویی',
                'slug' => 'products/cat/media-converters',
                'thumb' => 'media.svg',
                'cat' => '2',
            ],
            [
                'id' => '3',
                'title' => 'مودم، روتر و تجهیزات شبکه',
                'slug' => 'products/cat/routers-modems',
                'thumb' => 'modem.svg',
                'cat' => '6',
            ],
            [
                'id' => '4',
                'title' => 'سیستم‌های انتقال تلفنی و VOIP',
                'slug' => 'products/cat/systems',
                'thumb' => 'tele.svg',
                'cat' => '9',
            ],
            [
                'id' => '5',
                'title' => 'تجهیزات مبدل سریال و Gateway',
                'slug' => 'products/cat/serial-converter',
                'thumb' => 'serial.svg',
                'cat' => '51',
            ],
            [
                'id' => '6',
                'title' => 'تجهیزات پسیو شبکه',
                'slug' => 'products/cat/passive-equipments',
                'thumb' => 'net.svg',
                'cat' => '52',
            ],
            [
                'id' => '7',
                'title' => 'تجهیزات فیبر نوری',
                'slug' => 'products/cat/optical-fiber',
                'thumb' => 'fiber.svg',
                'cat' => '3',
            ],
            [
                'id' => '8',
                'title' => 'تجهیزات برق صنعتی',
                'slug' => 'products/cat/equipment-supply/power-supply',
                'thumb' => 'equ.svg',
                'cat' => '45',
            ],
        ];
        // $widget_sub_category = WidgetSubCategory::all();
        // $widget_why_us = WidgetWhyUs::all();
        $post_last = Post::where('type', '=', 'post')->where('publish', '=', 'on')->where('thumb', '!=', '')->orderBy('id', 'DESC')->limit(4)->get();
        $topic_last = Topic::where('type', '=', 'q')->where('publish', '=', 'on')->orderBy('id', 'DESC')->limit(6)->get();
        $topic_visited = Topic::where('type', '=', 'product')->where('publish', '=', 'on')->orderBy('id', 'DESC')->limit(6)->get();
        $most_visited = Product::popularMonth()->where('publish', '=', 'on')->where('thumb', '!=', '')->limit(6)->get();
        return view('web.pages.home.index',
            compact(
                'menus',
                'products',
                'widget_main_category',
                //'widget_sub_category',
                //'widget_why_us',
                'post_last',
                'topic_last',
                'topic_visited',
                'most_visited'
            )
        );
    }

}
