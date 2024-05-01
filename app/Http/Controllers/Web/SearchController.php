<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Product;
use App\Models\Menu;
use App\Models\Topic;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Download;
use App\Models\Datasheet;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class SearchController extends \App\Http\Controllers\Controller
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
    public function SearchPage(){
        $data = [
            'keyword' => '[]',
            'keyword_posts' => '[]',
            'keyword_products' => '[]',
            'keyword_topics' => '[]',
            'keyword_users' => '[]',
            'keyword_invoices' => '[]',
            'keyword_dls_pdf' => '[]',
            'keyword_datasheets' => '[]',
            'keyword_menu' => '[]'
        ];
        return view('web.pages.search.index', $data );
    }
    public function SearchPage_keyword(Request $keyword){
        $keyword = Request()->keyword;
        $keyword_menu = Menu::orderBy('id', 'ASC')
                    ->where('type', 'product')
                    ->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('content', 'like', '%' . $keyword . '%')
                    ->get();
        $keyword_products = Product::where('thumb','!=','')
                    ->where(function($query) {
                        $query->where('publish','=','publish')->orWhere('publish', '=', 'on');
                    })
                    ->where(function($query) use ($keyword){
                        $query
                            ->where('title', 'like', '%' . $keyword . '%')
                            ->orWhere('content', 'like', '%' . $keyword . '%')
                            ->orWhere('detials', 'like', '%' . $keyword . '%')
                            ->orWhere('slug', 'like', '%' . $keyword . '%')
                            ->orWhere('sku', 'like', '%' . $keyword . '%')
                            ->orWhere('sku_n', 'like', '%' . $keyword . '%')
                            ->orWhere('sku', 'like', '%' . str_replace( ' ' , '-' , $keyword ) . '%')
                            ->orWhere('sku_n', 'like', '%' . str_replace( ' ' , '-' , $keyword ) . '%')
                            ->orWhere('slug', 'like', '%' . str_replace( ' ' , '-' , $keyword ) . '%');
                    })
                    ->orderBy('id', 'DESC')
                    ->get();

        $keyword_posts = Post::where('type','=','post')
                    ->where('thumb','!=','')
                    ->where(function($query) {
                        $query->where('publish','=','publish')->orWhere('publish', '=', 'on');
                    })
                    ->orderBy('id', 'DESC')
                    ->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('content', 'like', '%' . $keyword . '%')
                    ->orWhere('slug', 'like', '%' . $keyword . '%')
                    ->orWhere('slug', 'like', '%' . str_replace( ' ' , '-' , $keyword ) . '%')
                    ->get();

        $keyword_topics = Topic::where(function($query) {
                        $query->where('type','=','q')->orWhere('type', '=', 'product');
                    })
                    ->orderBy('id', 'DESC')
                    ->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('content', 'like', '%' . $keyword . '%')
                    ->get();

        $keyword_users = User::orderBy('id', 'DESC')
                    ->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('username', 'like', '%' . $keyword . '%')
                    ->orWhere('mobile', 'like', '%' . $keyword . '%')
                    // ->orWhere('telephone', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%')
                    ->get();


        $keyword_invoices = Invoice::orderBy('id', 'DESC')
                    ->where('order_no', 'like', '%' . $keyword . '%')
                    ->orWhere('customer_name', 'like', '%' . $keyword . '%')
                    ->get();

        if ( Gate::allows('show_id_user') ) {
            $user_id = Auth::guard('web')->user()->id;
            $keyword_invoices = Invoice::orderBy('id', 'DESC')
                        ->where( 'created_by' , '=' , $user_id )
                        ->orWhere('order_no', 'like', '%' . $keyword . '%')
                        ->orWhere('customer_name', 'like', '%' . $keyword . '%')
                        ->get();
        }

        $keyword_dls_pdf = Download::orderBy('id', 'DESC')
                    ->where('filename', 'like', '%' . $keyword . '%')
                    ->orWhere('filename', 'like', '%' . str_replace( ' ' , '-' , $keyword ) . '%')
                    ->where('type','=','pdf')
                    ->get();

        $keyword_datasheets = Datasheet::orderBy('id', 'DESC')
                    ->where('slug', 'like', '%' . $keyword . '%')
                    ->orWhere('title', 'like', '%' . $keyword . '%')
                    ->orWhere('sku', 'like', '%' . $keyword . '%')
                    ->orWhere('content', 'like', '%' . $keyword . '%')
                    ->orWhere('sku', 'like', '%' . str_replace( ' ' , '-' , $keyword ) . '%')
                    ->orWhere('slug', 'like', '%' . str_replace( ' ' , '-' , $keyword ) . '%')
                    ->get();

        $data = [
            'keyword' => $keyword,
            'keyword_posts' => $keyword_posts,
            'keyword_products' => $keyword_products,
            'keyword_topics' => $keyword_topics,
            'keyword_users' => $keyword_users,
            'keyword_invoices' => $keyword_invoices,
            'keyword_dls_pdf' => $keyword_dls_pdf,
            'keyword_datasheets' => $keyword_datasheets,
            'keyword_menu' => $keyword_menu
        ];

        return view('web.pages.search.index', $data );
    }

}
