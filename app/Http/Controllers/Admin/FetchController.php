<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use App\Models\Company;
use App\Models\Post;
use App\Models\Product;
use App\Models\Datasheet;
use App\Models\Bill;
use App\Models\Invoice;
use App\Models\Stock;
// use App\Models\Datasheets;
use App\Models\User;
// use App\Models\Letters;

class FetchController extends \App\Http\Controllers\Controller
{

    public function fetchProduct( Request $data_start ){ 

        $data_start = Request()->data_start;
        $url_slug = Request()->url_slug;
        $limit = 2000; 
        $url_fetch = 'product';

        $products = Product::orderBy('id', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->skip( $data_start )
                    ->take($limit)
                    ->get();

        $users = User::orderBy('id', 'DESC')->get();
        $companys = Company::orderBy('id', 'DESC')->get();

        $data = array(
            'limit' => $limit, 
            'url_fetch' => $url_fetch, 
            'url_slug' => $url_slug, 
            'products' => $products, 
            'users' => $users, 
            'companys' => $companys, 
        );              

        return view('admin.pages.ajax.fetch' , $data );
    }
    public function fetchProduct_Draft( Request $data_start ){ 

        $data_start = Request()->data_start;
        $url_slug = Request()->url_slug;
        $limit = 2000; 
        $url_fetch = 'product/draft';

        $products = Product::orderBy('id', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->where('publish', '=', 'draft')
                    ->skip( $data_start )
                    ->take($limit)
                    ->get();

        $users = User::orderBy('id', 'DESC')->get();
        $companys = Company::orderBy('id', 'DESC')->get();

        $data = array(
            'limit' => $limit, 
            'url_fetch' => $url_fetch, 
            'url_slug' => $url_slug, 
            'products' => $products, 
            'users' => $users, 
            'companys' => $companys, 
        );              

        return view('admin.pages.ajax.fetch' , $data );
    }

    public function fetchPost_Draft( Request $data_start ){ 

        $data_start = Request()->data_start;
        $url_slug = Request()->url_slug;
        $limit = 2000; 
        $url_fetch = 'post/draft';

        $posts = Post::orderBy('id', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->where('type','=','post')
                    ->where('publish', '=', 'draft')
                    ->skip( $data_start )
                    ->take($limit)
                    ->get();


        $data = array(
            'limit' => $limit, 
            'url_fetch' => $url_fetch, 
            'url_slug' => $url_slug, 
            'posts' => $posts, 
        );              

        return view('admin.pages.ajax.fetch' , $data );
    }

    public function fetchPost( Request $data_start ){ 

        $data_start = Request()->data_start;
        $url_slug = Request()->url_slug;
        $limit = 2000; 
        $url_fetch = 'post';

        $posts = Post::orderBy('id', 'DESC')->where('type','post')
                    ->orderBy('id', 'DESC')
                    ->skip( $data_start )
                    ->take($limit)
                    ->get();

        $users = User::orderBy('id', 'DESC')->get();
        $companys = Company::orderBy('id', 'DESC')->get();

        $data = array(
            'limit' => $limit, 
            'url_fetch' => $url_fetch, 
            'url_slug' => $url_slug, 
            'posts' => $posts, 
            'users' => $users, 
            'companys' => $companys, 
        );              

        return view('admin.pages.ajax.fetch' , $data );
    }

    public function fetchInvoice( Request $data_start ){ 

        $data_start = Request()->data_start;
        $url_slug = Request()->url_slug;
        $limit = 2000; 
        $url_fetch = 'invoice';

        $invoices = Invoice::orderBy('id', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->skip( $data_start )
                    ->take($limit)
                    ->get();

        $users = User::orderBy('id', 'DESC')->get();
        $companys = Company::orderBy('id', 'DESC')->get();

        $data = array(
            'limit' => $limit, 
            'url_fetch' => $url_fetch, 
            'url_slug' => $url_slug, 
            'invoices' => $invoices, 
            'users' => $users, 
            'companys' => $companys, 
        );              

        return view('admin.pages.ajax.fetch' , $data );
    }

    public function fetchBill( Request $data_start ){ 

        $data_start = Request()->data_start;
        $url_slug = Request()->url_slug;
        $limit = 2000; 
        $url_fetch = 'bill';

        $bills = Bill::orderBy('id', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->skip( $data_start )
                    ->take($limit)
                    ->get();

        $users = User::orderBy('id', 'DESC')->get();
        $companys = Company::orderBy('id', 'DESC')->get();

        $data = array(
            'limit' => $limit, 
            'url_fetch' => $url_fetch, 
            'url_slug' => $url_slug, 
            'bills' => $bills, 
            'users' => $users, 
            'companys' => $companys, 
        );              

        return view('admin.pages.ajax.fetch' , $data );
    }

    public function fetchInvoiceTypes( Request $data_start , $type ){ 

        $data_start = Request()->data_start;
        $url_slug = Request()->url_slug;
        $limit = 2000; 
        $url_fetch = 'invoice-types';

        $users = User::all();
        $companys = Company::all();
        $type =  Request()->type;

        $invoices = Invoice::orderBy('id', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->skip( $data_start )
                    ->take($limit)
                    ->where('invoice_type',$type)
                    ->get();

        $company_type_invoice = Company::where('type', $type)->value('type');

        $data = array(
            'limit' => $limit, 
            'url_fetch' => $url_fetch, 
            'url_slug' => $url_slug, 
            'invoices' => $invoices, 
            'users' => $users, 
            'companys' => $companys, 
        );

        return view('admin.pages.ajax.fetch' , $data );
    }

    public function fetchStock( Request $data_start ){ 

        $data_start = Request()->data_start;
        $url_slug = Request()->url_slug;
        $limit = 2000; 
        $url_fetch = 'stock';

        $stocks = Stock::orderBy('id', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->skip( $data_start )
                    ->take($limit)
                    ->get();

        $data = array(
            'limit' => $limit, 
            'url_fetch' => $url_fetch, 
            'url_slug' => $url_slug, 
            'stocks' => $stocks, 
        );              

        return view('admin.pages.ajax.fetch' , $data );
    }

    public function fetchUsers( Request $data_start ){ 

        $data_start = Request()->data_start;
        $url_slug = Request()->url_slug;
        $limit = 2000; 
        $url_fetch = 'users';

        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('admin_view') ) {
            abort(401);
        }
        $roles = Role::all(); // ->sortByDesc("id");
        $users = User::orderBy('id', 'DESC')
                    ->skip( $data_start )
                    ->take($limit)
                    ->get();
                    
        $data = array(
            'limit' => $limit, 
            'url_fetch' => $url_fetch, 
            'url_slug' => $url_slug, 
            'roles' => $roles, 
            'users' => $users, 
        );              

        return view('admin.pages.ajax.fetch' , $data );
    }

    public function fetchDatasheet( Request $data_start ){ 

        $data_start = Request()->data_start;
        $url_slug = Request()->url_slug;
        $limit = 2000; 
        $url_fetch = 'datasheet';
        $users = User::all();
        
        $datasheets = Datasheet::orderBy('id', 'DESC')
                    ->skip( $data_start )
                    ->take($limit)
                    ->get();

        $data = array(
            'limit' => $limit, 
            'url_fetch' => $url_fetch, 
            'url_slug' => $url_slug, 
            'datasheets' => $datasheets, 
            'users' => $users, 
        );

        return view('admin.pages.ajax.fetch' , $data );
    }

    public function checkUrl(Request $qequest, $url ){ 

        $data_id = Request()->data_id;
        $url = urlencode($url);
        $result = '0';

        $post = Post::where('slug', $url)->first();
        $product = Product::where('slug', $url)->first();
        $datasheet = Datasheet::where('slug', $url)->first();

        if ($post || $product || $datasheet) {
            $result = '1';
        }
        
        $post_id = Post::where('id', $data_id)->where('slug', $url)->first();
        $product_id = Product::where('id', $data_id)->where('slug', $url)->first();
        $datasheet_id = Datasheet::where('id', $data_id)->where('slug', $url)->first();
        
        if ($post_id || $product_id || $datasheet_id) {
            $result = '0';
        }

        return $result;
    }

    public function popupAjaxScroll($data){ 

        $data_start = Request()->data_start;
        $data_limit = Request()->data_limit;
        $data_popup = Request()->data_popup;
        $data_type = Request()->data_type;
        $limit = 2000; 

        // return 123;
        return view('admin.pages.ajax.fetch-popup' , compact('data','data_start','data_limit' ,'data_popup','data_type','limit') );

    }


}