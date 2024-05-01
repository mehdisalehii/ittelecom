<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreDatasheetRequest;
use App\Http\Requests\UpdateDatasheetRequest;
use App\Models\Datasheet;
use App\Models\DatasheetItem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Setting;

use App\Models\User;
use App\Models\Company;
use App\Models\Menu;
use App\Models\Download;
use App\Models\Todo;

use Illuminate\Support\Facades\File;
use PDF;
use Response;

class DatasheetController extends \App\Http\Controllers\Controller
{
    public function index()
    {

        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        if (! Gate::allows('widget_view') ) {
            abort(401);
        }

        $datasheets = Datasheet::orderBy('id','DESC')->get();
        $users = User::orderBy('id', 'DESC')->get();
        $username = Auth::guard('web')->user()->username;
        $name = User::where('username', $username)->value('name');
        $companys = Company::orderBy('id', 'DESC')->get();

        return view('admin.pages.datasheet.index', compact('datasheets','users','companys','name')  );
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

        $datasheets = Datasheet::orderBy('id')->get();
        /// Group By ::> Error Query :::: config/database.php  :::>   'strict' => false,
        // $companys = Company::select('selcheck')->orderBy('id', 'DESC')->groupBy('selcheck')->get(['id','selcheck', 'number_last', 'parentId', 'name']);
        $username = Auth::guard('web')->user()->username;
        $name = User::where('username', $username)->value('name');
        $gallary = Download::where('type','=','product')->orderBy('id', 'DESC')->get();
        $companys = Company::orderBy('id', 'DESC')->get();
        $is_sku = Menu::orderBy('id', 'ASC')->where('sku','!=','')->where('type','=','product')->get();
        $sku_first = Menu::orderBy('id', 'ASC')->where('sku','!=','')->where('type','=','product')->value('sku');
        $sku_n = getRandSku(4,'');
        $users = User::all();
        return view('admin.pages.datasheet.create', compact('datasheets','companys','users','gallary','name','is_sku','sku_first','sku_n')  );
    }

    public function store(Request $request)
    {

        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        // Validation Data
        $request->validate([
            'title' => 'required|max:150',
            'slug' => 'required|max:150',
        ],[
            'title.required' => 'لطفا " عنوان دیتاشیت " را وارد کنید. ',
            'slug.required' => 'لطفا " ادرس دیتاشیت " را وارد کنید. ',
        ]);

        // Create New Datasheet
        $Datasheet = new Datasheet();
        $Datasheet->slug = $request->slug;
        $Datasheet->title = $request->title;
        $Datasheet->features = $request->features;
        $Datasheet->content = $request->input('content');
        $Datasheet->thumb = $request->thumb;
        $Datasheet->sku = $request->sku;
        $Datasheet->sku_n = $request->sku_n;
        $Datasheet->user_id = Auth::guard('web')->user()->id;
        $Datasheet->save();

        $id = Datasheet::orderBy('id', 'ASC')->get()->last();
        $total_number_item = $request->total_number_item;

        for( $count = 0 ; $count < $total_number_item ; $count++ ) {
            $DatasheetItem = new DatasheetItem();
            $DatasheetItem->datasheet_id = $id->id;
            $DatasheetItem->description = $request->input('item.'.$count.'.description') ;
            $DatasheetItem->save();
        }

        // Create New TODO
        $Todo = new Todo();
        $Todo->no_id = $id->id;
        $Todo->user = Auth::guard('web')->user()->username;
        $Todo->publish = 'updated';
        $Todo->type = 'datasheet';
        $Todo->save();

        session()->flash('success', 'دیتاشیت جدید اضافه شد.');
        return redirect()->route('admin.datasheet.index');
    }

    public function show($id)
    {
        abort(404);
    }

    public function pdf($slug)
    {

        $slug = str_replace('.pdf','',$slug);

        $datasheets = Datasheet::where('slug','=', $slug )->first(); // and ;
        $id = Datasheet::where('slug','=', $slug )->value('id'); // and ;
        $datasheet_items = DatasheetItem::where('datasheet_id', $id )->get();

        // return 'pdf-'.$id;
        $data = [
            'slug' => $slug,
            'datasheets' => $datasheets,
            'datasheet_items' => $datasheet_items,
            'date' => date('Y/m/d'),
        ];

        $config = [
            'format' => 'A4', // [1000, 236], // 'A4','A4-L',
            'orientation' => 'P' , // L  / P
            'author' => 'آی‌تی‌تلکام',
            'subject' =>  'آی‌تی‌تلکام',
            'keywords' =>  'آی‌تی‌تلکام',
            'creator' =>  'آی‌تی‌تلکام',
            'instanceConfigurator' => function ($pdf) {
            }
        ];
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');

        if($datasheets){
            $pdf = PDF::loadView('admin.pages.datasheet.pdf' , $data , [] , $config ) ; //// P : L
            return $pdf->stream( $slug . '.pdf');  /// For Display PDF on Browser
            // return $pdf->download('Datasheet-'.$id . '-'. Define::NameNative. '.pdf'); /// For Download
            // return response()->file('file.pdf');  /// For Location PDF open file
        }

        // $file = resource_path().'/uploads/catalog/'. $slug . '.pdf';
        $file = storage_path().'/uploads/catalog/'. $slug . '.pdf';
        if (File::exists($file)) {

            // return Response::download($file, "filename.pdf" , ['Content-Type: application/pdf'] );
            $file = File::get($file);
            $response = Response::make($file,200);
            return $response->header('Content-Type', 'application/pdf');

        }

        return abort(404);
    }

    public function edit($id)
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

        // $user = User::find($id);
        // $roles  = Role::all();
        // return view('admin.pages.users.edit', compact('user', 'roles'));
        $companys = Company::orderBy('id', 'DESC')->get();
        $users = User::orderBy('id', 'DESC')->get();
        // $datasheets = Datasheet::orderBy('id')->get();
        $datasheet = Datasheet::where('id', $id )->first();
        $datasheet_items = DatasheetItem::where('datasheet_id', $id )->get();
        $gallary = Download::where('type','=','product')->orderBy('id', 'DESC')->get();
        $id = Datasheet::where('id', $id)->value('id');
        $is_sku = Menu::orderBy('id', 'ASC')->where('sku','!=','')->where('type','=','product')->get();
        $sku_first = Menu::orderBy('id', 'ASC')->where('sku','!=','')->where('type','=','product')->value('sku');
        $sku_n = getRandSku(4,'');
        $todos = Todo::orderby('id','ASC')->where('type','datasheet')->where('no_id',$id)->get();
        return view('admin.pages.datasheet.edit', compact('id','companys','users','datasheet','datasheet_items','gallary','is_sku','sku_first','sku_n','todos') );
    }

    public function update(Request $request, $id)
    {

        // Validation Data
        $request->validate([
            'title' => 'required|max:150',
            'slug' => 'required|max:150',
        ],[
            'title.required' => 'لطفا " عنوان دیتاشیت " را وارد کنید. ',
            'slug.required' => 'لطفا " ادرس دیتاشیت " را وارد کنید. ',
        ]);

        // Create New TODO
        $Todo = new Todo();
        $Todo->no_id = $id;
        $Todo->user = Auth::guard('web')->user()->username;
        $Todo->publish = 'updated';
        $Todo->type = 'datasheet';
        $Todo->save();

        // Update New Datasheet
        $Datasheet = Datasheet::find($id);
        $Datasheet->slug = $request->slug;
        $Datasheet->title = $request->title;
        $Datasheet->features = $request->features;
        $Datasheet->content = $request->input('content');
        $Datasheet->thumb = $request->thumb;
        $Datasheet->sku = $request->sku;
        $Datasheet->sku_n = $request->sku_n;
        $Datasheet->user_id = $request->user_id;
        $Datasheet->save();

        $total_number_item = $request->total_number_item;
        $DatasheetItem = DatasheetItem::where( 'datasheet_id' , '=', $id )->delete();

        for( $count = 0 ; $count < $total_number_item ; $count++ ) {
            $DatasheetItem = new DatasheetItem();
            $DatasheetItem->datasheet_id = $id;
            $DatasheetItem->description = $request->input('item.'.$count.'.description') ;
            $DatasheetItem->save();
        }

        session()->flash('success', 'دیتاشیت بروزرسانی شد.');
        return back();
        // return redirect()->route('admin.datasheet.update');
    }

    public function destroy(Request $request, $id)
    {
        abort(401);
        $Datasheet = Datasheet::find($id);
        if (!is_null($Datasheet)) {
            $Datasheet->delete();
        }

        session()->flash('delete', 'دیتاشیت موردنظر حذف شد.');
        return back();
    }
}
