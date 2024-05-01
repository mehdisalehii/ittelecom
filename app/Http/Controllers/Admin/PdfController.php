<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use App\Models\Menu;
use App\Models\User;
use App\Models\Download;
use App\Models\Product;

use Illuminate\Support\Facades\File;
use PDF;
use Response;

class PdfController extends \App\Http\Controllers\Controller
{
    public function index() {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        $total_pdf = count(Download::select('id')->where('type','pdf')->get());
        $downloads_pdf = Download::orderBy('id','DESC')->where('type','pdf')->get();
        $products = Product::get();

        if ( Gate::allows('sale_view') || Gate::allows('content_view') ) {
            return view('admin.pages.pdf.index', compact('downloads_pdf','products' ,'total_pdf') );
        }

        abort(401);
    }

    public function fetchIndex() {

        $data_start = Request()->data_start;
        $url_slug = Request()->url_slug;
        $limit = 2000;
        $url_fetch = 'pdf';

        $downloads_pdf = Download::orderBy('id', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->where('type','pdf')
                    ->skip( $data_start )
                    ->take($limit)
                    ->get();
        $products = Product::get();

        $data = array(
            'limit' => $limit,
            'url_fetch' => $url_fetch,
            'url_slug' => $url_slug,
            'downloads_pdf' => $downloads_pdf,
            'products' => $products,
        );

        return view('admin.pages.ajax.fetch' , $data );

    }

}
