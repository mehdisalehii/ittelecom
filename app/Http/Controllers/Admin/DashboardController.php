<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\DB;

use App\Models\Invoice;
use App\Models\Post;
use App\Models\Product;
use App\Models\Topic;
use App\Models\User;
use App\Models\Stat;
use App\Models\Stock;
use App\Models\Letter;
use App\Models\Bill;

class DashboardController extends \App\Http\Controllers\Controller
{

    public function error()
    {
        return view('errors.soon');
    }

    public function index()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        $user_id = Auth::guard('web')->user()->id;

        $total_users = count(User::select('id')->get());
        $total_posts = count(Post::select('id')->where('type','post')->get());
        $total_products = count(Product::select('id')->get());
        $total_topics = count(Topic::select('id')->get());
        $total_invoices = count(Invoice::select('id')->get());
        //$total_letters = count(Letter::select('id')->get());
        $total_bills = count(Bill::select('id')->get());
        $sum_stock = Stock::sum('number');

        $stat_invoice_commerical = count(Invoice::select('id')->where('invoice_type','Commerical')->get());
        $stat_invoice_beforeInvoice = count(Invoice::select('id')->where('invoice_type','BeforeInvoice')->get());
        $stat_invoice_sale = count(Invoice::select('id')->where('invoice_type','Sale')->get());
        $stat_publish_product = count(Product::select('id')->where('publish','on')->get());
        $stat_draft_product = count(Product::select('id')->where('publish','draft')->get());
        $stat_publish_post = count(Post::select('id')->where('publish','on')->where('type','post')->get());
        $stat_draft_post = count(Post::select('id')->where('publish','draft')->where('type','post')->get());
        $stat_topic_question = count(Topic::select('id')->where('type','q')->get());
        $stat_topic_product = count(Topic::select('id')->where('type','product')->get());

        $posts = Post::orderby('id', 'DESC')->limit(5)->get();
        $products = Product::orderby('id', 'DESC')->limit(5)->get();

        $roles = Role::all(); // ->sortByDesc("id");

        if ( Gate::allows('sale_manage_view') || Gate::allows('seller_view') ) {
            $stat_publish_product = 0;
            $stat_draft_product = 0;
            $stat_publish_post = 0;
            $stat_draft_post = 0;
        }
        if ( Gate::allows('seo_view') ) {
            $posts = Post::orderby('id', 'DESC')->where('publish','=','draft')->limit(5)->get();
            $products = Product::orderby('id', 'DESC')->where('publish','=','draft')->limit(5)->get();

            $stat_invoice_sale = 0;
            $stat_invoice_commerical = 0;
            $stat_invoice_beforeInvoice = 0;
        }

        if ( Gate::allows('show_id_user') ) {
            $total_invoices = count(Invoice::select('id')->where( 'created_by' , '=' , $user_id )->get());
            $stat_invoice_commerical = count(Invoice::select('id')->where('invoice_type','Commerical')->where( 'created_by' , '=' , $user_id )->get());
            $stat_invoice_beforeInvoice = count(Invoice::select('id')->where('invoice_type','BeforeInvoice')->where( 'created_by' , '=' , $user_id )->get());
            $stat_invoice_sale = count(Invoice::select('id')->where('invoice_type','Sale')->where( 'created_by' , '=' , $user_id )->get());
        }

        if ( Gate::allows('sale_view') || Gate::allows('content_view') || Gate::allows('content_user_view') ) {
            return view('admin.pages.dashboard.index', compact('posts', 'products', 'roles', 'total_users', 'total_posts', 'total_products', 'total_invoices','total_bills','sum_stock', 'total_topics', 'stat_invoice_commerical' ,'stat_invoice_beforeInvoice' , 'stat_invoice_sale' ,'stat_publish_product','stat_draft_product','stat_publish_post','stat_draft_post','stat_topic_question','stat_topic_product') );
        }

        abort(401);

    }
}
