<?php


namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Company;
use App\Models\BillItem;
use App\Models\Setting;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Helper\Number2Word;

use PDF;
use Response;

class BillController extends \App\Http\Controllers\Controller
{
    public function index()
    {

        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        if (! Gate::allows('sale_view') ) {
            abort(401);
        }

        $user_id = Auth::guard('web')->user()->id;
        $users = User::all();
        $companys = Company::all();
        $bills = Bill::orderBy('id','DESC')->get();

        $total_bills = count(Bill::select('id')->get());

        if ( Gate::allows('show_id_user') ) {
            $bills = Bill::orderBy('id','DESC')->where( 'user_id' , '=' , $user_id )->get();
        }

        return view('admin.pages.bill.index', compact( 'bills', 'users', 'companys' , 'total_bills' ) );

    }
    public function create()
    {

        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        if (! Gate::allows('sale_create') ) {
            abort(401);
        }

        $last_number = Bill::orderBy('id', 'DESC')->value('order_no')+1;

        $username = Auth::guard('web')->user()->username;
        $name = User::where('username', $username)->value('name');
        $companys = Company::all();
        $companys_group = Company::select('id','parentId','title', 'name', 'number_last',  'styled', 'type')->orderBy('id', 'DESC')->groupBy('name')->get();  /// php artisan config:cache   /// config/database.php :: 'strict' => false,

        return view('admin.pages.bill.create', compact( 'username', 'name', 'companys', 'companys_group','last_number' ) );

    }
    public function store(Request $request)
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        if (! Gate::allows('sale_create') ) {
            abort(401);
        }

        $this->validateBill($request);

        function getRandHash($len) {
            $word = array_merge( range('0', '9') , range('a', 'z') );
            shuffle($word);
            return substr(implode($word), 0, $len);
        }

        $order_no_last = Bill::orderBy('id', 'ASC')->get()->last();
        $order_no_last =  $order_no_last->order_no+1;

        $Bill = new Bill();
        $Bill->order_no = $order_no_last ;
        $Bill->hash = getRandHash(5);
        $Bill->name = $request->name;
        $Bill->description = $request->description;
        $Bill->total_amount = $request->total_amount ? $request->total_amount : '0';
        $Bill->user_id = Auth::guard('web')->user()->id;

        $total_number_item = $request->total_number_item;

        for( $count = 0 ; $count < $total_number_item ; $count++ ) {
            $BillItem = new BillItem();
            $BillItem->bill_id = $order_no_last;
            $BillItem->product_name = $request->input('item.'.$count.'.product_name') ;
            $BillItem->part_no = $request->input('item.'.$count.'.part_no') ;
            $BillItem->unit = $request->input('item.'.$count.'.unit');
            $BillItem->save();
        }

        $Bill->save();

        session()->flash('success', 'حواله جدید اضافه شد.');

        return redirect()->route('admin.bill.index');
    }

    public function show($id)
    {
        return abort(404);
    }

    public function edit($id)
    {

        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        if (! Gate::allows('sale_edit') ) {
            abort(401);
        }

        $user_id = Auth::guard('web')->user()->id;
        $order_no = Bill::where('id', $id)->value('order_no');
        $created_by = Bill::where('id', $id)->value('user_id');

        $users = User::all();
        $companys = Company::all();
        // $companys_group = Company::select('id','title', 'number_last', 'parentId', 'styled', 'name', 'type')->orderBy('id', 'DESC')->groupBy('title')->get();
        $companys_group = Company::select('id','parentId','title', 'name', 'number_last',  'styled', 'type')->orderBy('id', 'DESC')->groupBy('name')->get();  /// php artisan config:cache   /// config/database.php :: 'strict' => false,

        $BillItem = BillItem::orderBy('id','ASC')->where('bill_id', $order_no )->get();
        $bill = Bill::where('id', $id )->first();

        if ( Gate::allows('show_id_user') ) {
            if ( $created_by  !=  $user_id ) {
                $bill = Bill::where('id', $id )->where( 'user_id' , '=' , $user_id )->first();
            }
        }

        if($bill){
            return view('admin.pages.bill.edit', compact( 'id', 'companys', 'companys_group', 'users', 'order_no', 'bill', 'BillItem' ) );
        }

        abort(401);

    }

    public function update(Request $request, $id)
    {

        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        if (! Gate::allows('sale_edit') ) {
            abort(401);
        }

        $this->validateBill($request);

        $Bill = Bill::find($id);

        $Bill->order_no = $request->order_no;
        $Bill->hash = $request->hash;
        $Bill->description = $request->description;
        $Bill->name = $request->name;
        $Bill->total_amount = str_replace( ',','', $request->total_amount );

        $Bill->ordered_at = $request->ordered_at;

        $Bill->save();

        $bill_id = $request->order_no;
        $total_number_item = $request->total_number_item;
        $BillItem = BillItem::where( 'bill_id' , '=', $bill_id )->delete();

        for( $count = 0 ; $count < $total_number_item ; $count++ ) {
            $BillItem = new BillItem();
            $BillItem->bill_id = $bill_id;
            $BillItem->product_name = $request->input('item.'.$count.'.product_name') ;
            $BillItem->part_no = $request->input('item.'.$count.'.part_no') ;
            $BillItem->unit = $request->input('item.'.$count.'.unit');
            if ( $BillItem->part_no != '--REMOVE--' ) {
                $BillItem->save();
            }
        }
        session()->flash('success', 'حواله بروزرسانی شد.');
        return back();

    }

    public function destroy(Request $request, $id)
    {
        abort(401);
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        if (! Gate::allows('sale_delete') ) {
            abort(401);
        }

        $Bill = Bill::find($id);
        if (!is_null($Bill)) {
            $Bill->delete();
        }
        session()->flash('delete', 'حواله موردنظر حذف شد.');
        return redirect()->route('admin.bill.index');
    }

    public function pdf($order_no,$hash)
    {

        $companys = Company::all();
        $companys_group = Company::select('*','id')->orderBy('id', 'DESC')->get();
        $users = User::all();

        $bills = Bill::where('order_no','=', $order_no)->where('hash','=',$hash)->first();
        $BillItem = BillItem::orderBy('id','ASC')->where('bill_id', $order_no )->get();

        $num2word = new Number2Word();
        // $totalnum2word = $num2word->numberToWords(0);
        $view = 'portrait';

        $data = [
            'order_no' => $order_no,
            'hash' => $hash,
            'users' => $users,
            'companys' => $companys,
            'companys_group' => $companys_group,
            'bills' => $bills,
            'BillItem' => $BillItem,
            'num2word' => $num2word,
            'date' => date('Y/m/d'),
        ];

        $config = [
            'format' => 'A4',
            'author' => 'آی‌تی‌تلکام',
            'subject' =>  'آی‌تی‌تلکام',
            'keywords' =>  'آی‌تی‌تلکام',
            'creator' =>  'آی‌تی‌تلکام',
            'instanceConfigurator' => function ($pdf) { }
        ];

        if($bills){
            $pdf = PDF::loadView('admin.pages.bill.pdf.' . $view , $data , [] , $config ) ;
            return $pdf->stream('Bill-'.$order_no . '-'. 'ittelecom' . '.pdf');
            //return $pdf->download('Bill-'.$order_no . '-'. 'ittelecom' . '.pdf'); /// For Download
        } else {
            abort(404);
        }
    }

    protected function validateBill(Request $request)
    {

        $request->validate([
            'name' => 'required|max:150',
        ],[
            'name.required' => 'لطفا " نام خریدار (شخص حقیقی/حقوقی) " را وارد کنید. ',
        ]);

    }

}
