<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MessageDB;
use App\Models\Post;

class PageController extends \App\Http\Controllers\Controller
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
    public function pageInfo() {

        return view('web.pages.page.info' );
    }
}
