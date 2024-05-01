<?php

namespace App\Http\Controllers\AMP;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Topic;
use App\Models\User;

class TopicController extends \App\Http\Controllers\Controller
{

    public function forum(){


        $menu_forum = Menu::where('type','=','topic')->orderBy('id', 'ASC')->get();
        $topics = Topic::where('type','=','q')->where('publish','=','publish')->orWhere('publish', '=', 'on')->orderBy('id', 'DESC')->limit(5)->get();
        $topics_visit = Topic::where('type','=','q')->where('publish','=','publish')->orWhere('publish', '=', 'on')->orderBy('id', 'DESC')->limit(9)->get();
        $slideshow = Topic::where('type','=','q')->where('publish','=','publish')->orWhere('publish', '=', 'on')->orderBy('id', 'DESC')->limit(5)->skip(2)->get();
        $reading = Topic::where('type','=','q')->where('publish','=','publish')->orWhere('publish', '=', 'on')->orderBy('created_at', 'DESC')->limit(15)->get();
        $users = User::orderBy('id', 'DESC')->get();
        $category_menu = Menu::where('type','=','q')->orderBy('sort', 'ASC')->get();

        $data = array(
            'menu_forum' => $menu_forum ,
            'topics' => $topics,
            'topics_visit' => $topics_visit,
            'slideshow' => $slideshow,
            'reading' => $reading,
            'users' => $users,
            'category_menu' => $category_menu,

        );


        if($topics){
            return view('amp.forum', $data );
        } else {
            abort(404); // return view('errors.404' , $data );
        }

    }


    public function topic($url) {

        $menu_forum = Menu::where('type','=','forum')->orderBy('id', 'ASC')->get();
        $category_menu = Menu::where('type','=','forum')->orderBy('sort', 'ASC')->get();
        $users = User::orderBy('id', 'DESC')->get();
        $topic = Topic::where('slug', urlencode($url) )
                            ->where(function($query) {
                                $query->where('type','=','q')->orWhere('type', '=', 'product');
                            })
                            ->where(function($query) {
                                $query->where('publish','=','publish')->orWhere('publish', '=', 'on');
                            })
                            ->first();
        $answer = Topic::where('type','=','a') ->get();

        $answer_first = Topic::where('type','=','a') ->first();

        $data = array(
            'menu_forum' => $menu_forum ,
            'category_menu' => $category_menu ,
            'users' => $users ,
            'url' => $url,
            'topic' => $topic,
            'answer' => $answer,

        );

        if($topic){
            return view('amp.pages.forum.topic', $data );
        } else {
            abort(404); // return view('errors.404' , $data );
        }


    }
}
