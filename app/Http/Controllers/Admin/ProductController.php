<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Menu;
use App\Models\Category;
use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use App\Models\Download;
use App\Models\Seo;

use PDF;
use Response;

class ProductController extends \App\Http\Controllers\Controller
{
    public function index()
    {

        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        if (! Gate::allows('widget_view') ) {
            abort(401);
        }

        $total_products = count(Product::select('id')->get());
        $stat_publish_product = count(Product::select('id')->where('publish','on')->get());
        $stat_draft_product = count(Product::select('id')->where('publish','draft')->get());

        $products = Product::where('thumb','!=','')
                                ->where(function($query) {
                                    $query->where('publish','=','publish')->orWhere('publish', '=', 'on');
                                })
                                ->orderBy('id', 'DESC')
                                ->get();

        if ( Gate::allows('sale_view') || Gate::allows('content_view') ) {
            $products = Product::orderBy('id', 'DESC')->get();
        }

        if($products){
            return view('admin.pages.product.index', compact('products','total_products','stat_publish_product','stat_draft_product') );
        } else {
            abort(404);
        }

    }

    public function draft()
    {

        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        if ( Gate::allows('customer_view') ) {
            abort(401);
        }

        $products = Product::where('thumb','!=','')->where('publish', '=', 'draft')->orderBy('id', 'DESC')->get();

        if ( Gate::allows('sale_view') || Gate::allows('content_view') ) {
            $products = Product::orderBy('id', 'DESC')->where('publish', '=', 'draft')->get();
        }

        if($products){
            return view('admin.pages.product.draft', compact('products') );
        } else {
            abort(404);
        }

    }

    public function create()
    {

        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        if ( Gate::allows('accountant_view') || Gate::allows('seller_view') || Gate::allows('sale_manage_view') || Gate::allows('customer_view') ) {
            abort(401);
        }

        function getRandSku($len , $except ) {
            do {
                // $rand = rand(1,15);
                $rand = array_merge( range('0', '9') );  // , range('a', 'z')
                shuffle($rand);
                $get = substr(implode($rand), 0, $len);
            } while ($get == $except);
            // return $rand;
            return $get;
        }

        $download_pdf = Download::where('type','=','pdf')->orderBy('filename', 'ASC')->get();
        $download_zip = Download::where('type','=','zip')->orderBy('filename', 'ASC')->get();
        $gallary = Download::where('type','=','product')->orderBy('id', 'DESC')->get();
        $is_sku = Menu::orderBy('id', 'ASC')->where('sku','!=','')->where('type','=','product')->get();
        $sku_first = Menu::orderBy('id', 'ASC')->where('sku','!=','')->where('type','=','product')->value('sku');
        $sku_n = getRandSku(4,'');

        return view('admin.pages.product.create', compact( 'download_pdf','download_zip','gallary','is_sku' , 'sku_first' ,'sku_n' ) );
    }

    public function store(Request $request)
    {

        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        $this->validateProduct($request);

        // $order_no_last = Product::orderBy('id', 'ASC')->get()->last();
        // $order_no_last =  $order_no_last->order_no+1;
        $order_no_last =  Product::all()->last()->id+1;

        $tags_string = str_replace(',',';;;',$request->tags);
        $tags_string = str_replace('،',';;;', $tags_string);
        $tags = explode(';;;', $tags_string);
        foreach($tags as $key=>$tag){
            $tag = trim(strip_tags($tag));
            if(!empty($tag)){
                $tags[$key] = $tag;
            }
        }
        $Product = new Product();
        $Product->title = $request->title;
        $Product->slug = urlencode(strtolower($request->slug)) ;
        $Product->content = $request->input('content');
        $Product->detials = $request->detials;
        $Product->publish = $request->publish;
        $Product->thumb = $request->thumb;
        $Product->pdf = $request->pdf;
        // $Product->zip = $request->zip;
        $Product->sku_n = $request->sku_n;
        $Product->sku = $request->sku;
        // $Product->menu_ids = $request->menu_ids;
        $Product->created_at = now();
        $Product->updated_at = now();
        $Product->save();
        if(!empty($tags)){
            $Product->syncTagsWithType($tags, 'user-defined-tags');
        }
        /// Save Category
        $illness_arr = $request->catl; // returns an array
        // return count($illness_arr);
        // return $illness_arr;
        if( $illness_arr ){
            for( $count = 0 ; $count < count($illness_arr) ; $count++ ) {
                $CategoryItem = new Category();
                $CategoryItem->no_id = $order_no_last;
                $CategoryItem->menu_ids = $request->input('catl.'.$count);
                $CategoryItem->type = 'product';
                $CategoryItem->save();
            }
        }
        cache()->flush();
        session()->flash('success', 'محصول جدید اضافه شد.');
        return redirect()->route('admin.product.index');

    }

    public function show($id)
    {
        $category_menu = Menu::where('type','=','product')->orderBy('sort', 'ASC')->get();
        $product = Product::where('id', $id )->first();
        if($product){
            $product->visit();
            return view('web.pages.product.id', compact('category_menu','product') );
        } else {
            abort(404);
        }
    }

    public function edit($id)
    {

        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        if ( Gate::allows('accountant_view') || Gate::allows('seller_view') || Gate::allows('sale_manage_view') || Gate::allows('customer_view') ) {
            abort(401);
        }

        $companys = Company::orderBy('id', 'DESC')->get();
        $companys_group = Company::select('id','title', 'number_last', 'parentId', 'styled', 'name', 'type')->orderBy('id', 'DESC')->groupBy('title')->get();
        $users = User::orderBy('id', 'DESC')->get();
        $product = Product::where('id', $id )->first();
        $id = Product::where('id', $id)->value('id');
        $is_sku = Menu::orderBy('id', 'ASC')->where('sku','!=','')->where('type','=','product')->get();
        $category_menu = Menu::where('type','=','product')->orderBy('sort', 'ASC')->get();
        $categories = Category::where('no_id','=',$id)->where('type','=','product')->get();
        $download_pdf = Download::where('type','=','pdf')->orderBy('filename', 'ASC')->get();
        $download_zip = Download::where('type','=','zip')->orderBy('filename', 'ASC')->get();
        $gallary = Download::where('type','=','product')->orderBy('id', 'DESC')->get();

        if($product){
            return view('admin.pages.product.edit', compact('id','companys','companys_group','users','product','is_sku','category_menu','categories','download_pdf','download_zip','gallary'));
        } else {
            abort(404);
        }

    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        $tags_string = str_replace(',',';;;',$request->tags);
        $tags_string = str_replace('،',';;;', $tags_string);
        $tags = explode(';;;', $tags_string);
        foreach($tags as $key=>$tag){
            $tag = trim(strip_tags($tag));
            if(!empty($tag)){
                $tags[$key] = $tag;
            }
        }
        $this->validateProduct($request);
        $Product = Product::find($id);
        $Product->title = $request->title;
        $slug = Product::where('id', $id)->value('slug');
        $Product->slug = ($request->slug != $slug) ? urlencode(strtolower($request->slug)) : $request->slug ;
        $Product->content = $request->input('content');
        $Product->detials = $request->detials;
        $Product->publish = $request->publish;
        $Product->thumb = $request->thumb;
        $Product->pdf = $request->pdf;
        //$Product->zip = $request->zip;
        $Product->sku_n = $request->sku_n;
        $Product->sku = $request->sku;
        $Product->menu_ids = $request->catl ? implode(',', $request->catl) : null;
        // $created_at = \Morilog\Jalali\CalendarUtils::createCarbonFromFormat('Y/m/d H:i:s', $request->created_at );
        // $Product->created_at = $created_at;
        $Product->updated_at = now();
        $Product->save();
        if(!empty($tags)){
            $Product->syncTagsWithType($tags, 'user-defined-tags');
        }
        $product_id = $id;

        /// Save Category
        $CategoryItem = Category::where( 'no_id' , '=', $product_id )->delete();
        $illness_arr = $request->catl; // returns an array
        // return count($illness_arr);
        // return $illness_arr;
        if( $illness_arr ){
            for( $count = 0 ; $count < count($illness_arr) ; $count++ ) {
                $CategoryItem = new Category();
                $CategoryItem->no_id = $id;
                $CategoryItem->menu_ids = $request->input('catl.'.$count);
                $CategoryItem->type = 'product';
                $CategoryItem->save();
            }
        }
        cache()->flush();
        session()->flash('success', 'محصول بروزرسانی شد.');
        return back();

    }

    public function destroy(Product $product)
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(401);
        }
        $product->delete();

        session()->flash('delete', 'محصول موردنظر حذف شد.');
        return back();
    }

    protected function validateProduct(Request $request)
    {

        $request->validate([
            'title' => 'required|max:150',
            'slug' => 'required',
            'sku_n' => 'required',
        ],[
            'title.required' => 'لطفا " موضوع محصول " را وارد کنید. ',
            'slug.required' => 'لطفا " آدرس محصول " را وارد کنید. ',
            'sku_n.required' => 'لطفا "  پارت نامبر محصول " را وارد کنید. ',
        ]);

    }

}
