<?php

namespace App\Http\Controllers\AMP;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Product;

class ProductController extends \App\Http\Controllers\Controller
{

    public function shop(){


        $products = Product::where('thumb','!=','')
                            ->where(function($query) {
                                $query->where('publish','=','publish')->orWhere('publish', '=', 'on');
                            })
                            ->orderBy('id', 'DESC')

                            ->get();

        $data = array(
            'products' => $products
        );

        if($products){
            return view('amp.pages.product.shop', $data );
        } else {
            abort(404); // return view('errors.404' , $data );
        }

    }

    public function redirectToProduct($url)
    {
        $redirect_to = route('amp.redirectToProduct', $url, false);
        return redirect($redirect_to, 301);
    }
    public function product($url) {

        $product = Product::where('slug', urlencode($url) )->first();
        $category_menu = Menu::where('type','=','product')->orderBy('sort', 'ASC')->get();

        $data = array(
            'url'=>$url,
            'category_menu' => $category_menu,
            'product'=>$product
        );
        if($product){
            $product->visit();
            return view('amp.pages.product.id', $data );
        } else {
            abort(404); // return view('errors.404' , $data );
        }

    }
}
