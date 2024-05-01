<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Models\Menu;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Http\Request;


class AuthorController extends \App\Http\Controllers\Controller
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

    public function Author_URL($url){

        $users = User::all();
        $forum = Topic::where('type','=','q')->where('publish','=','publish')->orderBy('id', 'DESC')->get();
        $menu_forum = Menu::where('type','=','forum')->orderBy('id', 'ASC')->limit(6)->get();
        $category_menu = Menu::where('type','=','forum')->orderBy('sort', 'ASC')->get();
        return view('web.pages.author.id', compact( 'menu_forum','users','forum','category_menu','url'  ));
    }

}
