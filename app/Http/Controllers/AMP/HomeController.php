<?php
namespace App\Http\Controllers\AMP;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Product;
use App\Models\Topic;
use App\Models\WidgetSubCategory;

class HomeController extends \App\Http\Controllers\Controller
{
    public function home(){
        $menus = Menu::all();
        // $widget_sub_category = WidgetSubCategory::all();
        $post_last = Post::where('type','=','post')->where('publish', '=', 'on')->where('thumb', '!=', '')->orderBy('id', 'DESC')->limit(4)->get();
        $topic_last = Topic::where('type','=','q')->where('publish','=','on')->orderBy('id', 'DESC')->limit(6)->get();
        $topic_visited = Topic::where('type','=','product')->where('publish','=','on')->orderBy('id', 'DESC')->limit(6)->get();
        return view('amp.pages.home.index' ,  compact('menus','topic_last', 'topic_visited'));
    }

}
