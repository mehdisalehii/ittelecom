<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Setting;
use Carbon\Carbon;
use App\Helper\Number2Word;
use PDF;
use Response;

class InvoiceController extends \App\Http\Controllers\Controller
{
    private static $paginationSize = 50;
    private static $mobilePaginationMargin = 4;
    private static $firstOrLastPaginationMargin = 5;
    public function redirect()
    {
        return redirect()->route('admin.invoice.index');
    }
    // public function classForm()
    // {
    //     ///Class Form Create/Edit
    //     switch( URL::current() ) {
    //         case(str_contains(URL::current(), '/create' )!== false) :
    //             $class_form = 'form-content create';  break;
    //         case(str_contains(URL::current(), '/edit' )!== false) :
    //             $class_form = 'form-content edit';  break;
    //         default :
    //             $class_form = 'no-form';
    //     }
    //     // $class_form = 'test';
    //     return $class_form;
    // }

    public function index(Request $request)
    {
        $pageNumber = $request->get('page');
        $paginationSize = self::$paginationSize;
        // $class_form = $this->classForm(); // return $class_form;
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (!Gate::allows('sale_view')) {
            abort(401);
        }

        $user_id = Auth::guard('web')->user()->id;
        $users = User::all();
        $companys = Company::all();
        $invoicesQuery = Invoice::orderBy('created_at', 'DESC');
        $total_invoices = count(Invoice::select('id')->get());
        $stat_invoice_commerical = count(Invoice::select('id')->where('invoice_type', 'Commerical')->get());
        $stat_invoice_beforeInvoice = count(Invoice::select('id')->where('invoice_type', 'BeforeInvoice')->get());
        $stat_invoice_beforeCommerical = count(Invoice::select('id')->where('invoice_type', 'BeforeCommerical')->get());
        $stat_invoice_sale = count(Invoice::select('id')->where('invoice_type', 'Sale')->get());
        if (Gate::allows('show_id_user')) {
            $invoicesQuery = $invoicesQuery->where('created_by', '=', $user_id);
        }
        $invoices = $invoicesQuery->paginate($paginationSize, ['*'], 'page', $pageNumber);
        $data = [
            'invoices' => $invoices,
            'users' => $users,
            'companys' => $companys,
            'total_invoices' => $total_invoices,
            'stat_invoice_commerical' => $stat_invoice_commerical,
            'stat_invoice_beforeInvoice' => $stat_invoice_beforeInvoice,
            'stat_invoice_beforeCommerical' => $stat_invoice_beforeCommerical,
            'stat_invoice_sale' => $stat_invoice_sale,
        ];
        $data['mobile_pagination_margin'] = self::$mobilePaginationMargin;
        $first_or_last_pagination_margin = self::$firstOrLastPaginationMargin;
        if ($data['invoices']->currentPage() < $first_or_last_pagination_margin || $data['invoices']->currentPage() > ($data['invoices']->lastPage() - $first_or_last_pagination_margin)) {
            $data['mobile_pagination_margin'] = self::$firstOrLastPaginationMargin;
        }

        return view('admin.pages.invoice.index', $data);
    }

    public function types($type, Request $request)
    {
        $pageNumber = $request->get('page');
        $paginationSize = self::$paginationSize;
        abort_if(!Gate::allows('admin_panel'), 401);
        abort_if(!Gate::allows('sale_view'), 401);

        $user_id = Auth::guard('web')->user()->id;
        $users = User::all();
        $companys = Company::all();
        $invoicesQuery = Invoice::orderBy('created_at', 'DESC')->where('invoice_type', $type);
        $company_type_invoice = Company::where('type', $type)->value('type');
        if (Gate::allows('show_id_user')) {
            $invoices = $invoicesQuery->where('created_by', '=', $user_id)->get();
        }
        $invoices = $invoicesQuery->paginate($paginationSize, ['*'], 'page', $pageNumber);
        abort_if(empty($company_type_invoice), 404);

        $data = [
            'invoices' => $invoices,
            'users' => $users,
            'companys' => $companys,
        ];
        $data['mobile_pagination_margin'] = self::$mobilePaginationMargin;
        $first_or_last_pagination_margin = self::$firstOrLastPaginationMargin;
        if ($data['invoices']->currentPage() < $first_or_last_pagination_margin || $data['invoices']->currentPage() > ($data['invoices']->lastPage() - $first_or_last_pagination_margin)) {
            $data['mobile_pagination_margin'] = self::$firstOrLastPaginationMargin;
        }
        return view('admin.pages.invoice.types', $data);

    }

    public function create()
    {
        // $class_form = $this->classForm(); // return $class_form;
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (!Gate::allows('sale_create')) {
            abort(401);
        }
        $username = Auth::guard('web')->user()->username;
        $name = User::where('username', $username)->value('name');
        $companys = Company::all();
        $companys_group = Company::select('id', 'parentId', 'title', 'name', 'number_last', 'styled', 'type')->orderBy('id', 'DESC')->groupBy('name')->get();  /// php artisan config:cache   /// config/database.php :: 'strict' => false,
        return view('admin.pages.invoice.create', compact('username', 'name', 'companys', 'companys_group'));

    }

    public function store(Request $request)
    {
        
        // dd($request->all());
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (!Gate::allows('sale_create')) {
            abort(401);
        }

        $this->validateInvoice($request);
        function getRandHash($len)
        {
            $word = array_merge(range('0', '9'), range('a', 'z'));
            shuffle($word);
            return substr(implode($word), 0, $len);
        }

        $Invoice = new Invoice();
        $Invoice->order_no = $request->order_no;
        $Invoice->hash = getRandHash(5);
        $Invoice->created_by = Auth::guard('web')->user()->id;
        $Invoice->headerfooter = $request->headerfooter;
        $Invoice->price_unit = 'reial';
        $Invoice->invoice_type = $request->invoice_type;
        $Invoice->signature = $request->signature;
        $Invoice->description = $request->description;
        $Invoice->company_id = $request->company_id;
        $Invoice->show_company = $request->show_company;
        $Invoice->customer_name = $request->customer_name;
        $Invoice->customer_email = $request->customer_email;
        $Invoice->customer_tel = $request->customer_tel;
        $Invoice->customer_economynum = $request->customer_economynum;
        $Invoice->customer_regnationalnum = $request->customer_regnationalnum;
        $Invoice->customer_zipcode = $request->customer_zipcode;
        $Invoice->customer_city = $request->customer_city;
        $Invoice->customer_country = $request->customer_country;
        $Invoice->customer_fax = $request->customer_fax;
        $Invoice->customer_mob = $request->customer_mob;
        $Invoice->customer_address = $request->customer_address;
        $Invoice->tax = $request->tax;
        $Invoice->total_amount = $request->total_amount;
        // $Invoice->created_at = $request->created_at;

        $invoice_id = $request->order_no;
        $total_number_item = $request->total_number_item;
        $Companys = Company::where('parentId', '=', $request->input('company_id'))->first();
        $Companys->number_last = $request->input('order_no') + 1;
        for ($count = 0; $count < $total_number_item; $count++) {
            $InvoiceItem = new InvoiceItem();
            $InvoiceItem->invoice_id = $invoice_id;
            $InvoiceItem->product_name = $request->input('item.' . $count . '.product_name');
            $InvoiceItem->part_no = $request->input('item.' . $count . '.part_no');
            $InvoiceItem->quantity = str_replace(',', '', $request->input('item.' . $count . '.quantity'));
            $InvoiceItem->price = str_replace(',', '', $request->input('item.' . $count . '.price'));
            $InvoiceItem->unit = $request->input('item.' . $count . '.unit');
            $InvoiceItem->save();
        }
        $Invoice->save();
        $Companys->save();

        session()->flash('success', 'فاکتور جدید اضافه شد.');
        return redirect()->route('admin.invoice.index');
    }

    public function show($id)
    {
        return abort(404);
    }

    public function edit($id)
    {
        // $class_form = $this->classForm(); // return $class_form;
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (!Gate::allows('sale_edit')) {
            abort(401);
        }
        $user_id = Auth::guard('web')->user()->id;
        $order_no = Invoice::where('id', $id)->value('order_no');
        $created_by = Invoice::where('id', $id)->value('created_by');
        $users = User::all();
        $companys = Company::all();
        // $companys_group = Company::select('id','title', 'number_last', 'parentId', 'styled', 'name', 'type')->orderBy('id', 'DESC')->groupBy('title')->get();
        $companys_group = Company::select('id', 'parentId', 'title', 'name', 'number_last', 'styled', 'type')->orderBy('id', 'DESC')->groupBy('name')->get();  /// php artisan config:cache   /// config/database.php :: 'strict' => false,
        $InvoiceItem = InvoiceItem::orderBy('id', 'ASC')->where('invoice_id', $order_no)->get();
        $invoice = Invoice::where('id', $id)->first();
        if (Gate::allows('show_id_user')) {
            if ($created_by != $user_id) {
                $invoice = Invoice::where('id', $id)->where('created_by', '=', $user_id)->first();
            }
        }
        // dd($invoice);
        if ($invoice) {
            return view('admin.pages.invoice.edit', compact('id', 'companys', 'companys_group', 'users', 'order_no', 'invoice', 'InvoiceItem'));
        }

        abort(401);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (!Gate::allows('sale_edit')) {
            abort(401);
        }
        $this->validateInvoice($request);

        $Invoice = Invoice::find($id);
        $Invoice->order_no = $request->order_no;
        $Invoice->hash = $request->hash;
        $Invoice->created_by = $request->created_by;
        $Invoice->headerfooter = $request->headerfooter;
        $Invoice->invoice_type = $request->invoice_type;
        $Invoice->signature = $request->signature;
        $Invoice->description = $request->description;
        $Invoice->company_id = $request->company_id;
        $Invoice->show_company = $request->show_company;
        $Invoice->customer_name = $request->customer_name;
        $Invoice->customer_email = $request->customer_email;
        $Invoice->customer_tel = $request->customer_tel;
        $Invoice->customer_economynum = $request->customer_economynum;
        $Invoice->customer_regnationalnum = $request->customer_regnationalnum;
        $Invoice->customer_zipcode = $request->customer_zipcode;
        $Invoice->customer_city = $request->customer_city;
        $Invoice->customer_country = $request->customer_country;
        $Invoice->customer_fax = $request->customer_fax;
        $Invoice->customer_mob = $request->customer_mob;
        $Invoice->customer_address = $request->customer_address;
        $Invoice->tax = $request->tax;
        $Invoice->total_amount = $request->total_amount;
        // convert persian to latin
        // get instance of \Carbon\Carbon Date jalali
        // $updated_at = \Morilog\Jalali\CalendarUtils::createCarbonFromFormat('Y/m-d H:i:s', '1401-12-24 22:22:22' );
        // $updated_at = \Morilog\Jalali\CalendarUtils::createCarbonFromFormat('Y-m-d', $request->created_at );
        // $dateString = \Morilog\Jalali\CalendarUtils::convertNumbers( $request->ordered_at , true); // 1395-02-19
        // return $dateString;
        // $ordered_at = \Morilog\Jalali\CalendarUtils::createCarbonFromFormat( 'Y/m/d H:i:s', $dateString )->format('Y-m-d H:i:s'); //2016-05-8
        // return $updated_at;
        // return $request->ordered_at;
        // $Invoice->created_at = $created_at;
        // $Invoice->updated_at = now();
        // $Invoice->ordered_at = Carbon::parse($request->ordered_at);
        $Invoice->ordered_at = $request->ordered_at;
        $Invoice->save();
        $invoice_id = $request->order_no;
        $total_number_item = $request->total_number_item;
        $InvoiceItem = InvoiceItem::where('invoice_id', '=', $invoice_id)->delete();

        for ($count = 0; $count < $total_number_item; $count++) {
            $InvoiceItem = new InvoiceItem();
            $InvoiceItem->invoice_id = $invoice_id;
            $InvoiceItem->product_name = $request->input('item.' . $count . '.product_name');
            $InvoiceItem->part_no = $request->input('item.' . $count . '.part_no');
            $InvoiceItem->quantity = str_replace(',', '', $request->input('item.' . $count . '.quantity'));
            $InvoiceItem->price = str_replace(',', '', $request->input('item.' . $count . '.price'));
            $InvoiceItem->unit = $request->input('item.' . $count . '.unit');
            if ($InvoiceItem->part_no != '--REMOVE--') {
                $InvoiceItem->save();
            }
        }
        session()->flash('success', 'فاکتور بروزرسانی شد.');
        return back();
    }

    public function destroy(Request $request, $id)
    {
        abort(401);
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (!Gate::allows('sale_delete')) {
            abort(401);
        }
        $Invoice = Invoice::find($id);
        if (!is_null($Invoice)) {
            $Invoice->delete();
        }
        session()->flash('delete', 'فاکتور موردنظر حذف شد.');
        return redirect()->route('admin.invoice.index');
    }

    public function pdf($order_no, $type, $hash)
    {
        $companys = Company::all();
        $companys_group = Company::orderBy('id', 'DESC')->get();
        $users = User::all();
        if ($type == 'r') {
            $type = 'Commerical';
            $orientation = 'L';
            $view = 'landscape';
        } elseif ($type == 'w') {
            $type = 'BeforeCommerical';
            $orientation = 'L';
            $view = 'landscape';
        } elseif ($type == 'p') {
            $type = 'BeforeInvoice';
            $orientation = 'P';
            $view = 'portrait';
        } elseif ($type == 's') {
            $type = 'Sale';
            $orientation = 'P';
            $view = 'portrait';
        } else {
            $type = '';
            $orientation = 'P';
            $view = 'portrait';
        }
        $invoices = Invoice::where('order_no', '=', $order_no)->where('hash', '=', $hash)->where('invoice_type', '=', $type)->first();
//        \Log::debug('invoices');
//        \Log::debug($invoices);
        abort_if(empty($invoices), 404);
        $InvoiceItem = InvoiceItem::orderBy('id', 'ASC')->where('invoice_id', $order_no)->get();
        $num2word = new Number2Word();
        // $totalnum2word = $num2word->numberToWords(0);
        $data = [
            'order_no' => $order_no,
            'hash' => $hash,
            'users' => $users,
            'companys' => $companys,
            'companys_group' => $companys_group,
            'invoices' => $invoices,
            'InvoiceItem' => $InvoiceItem,
            'num2word' => $num2word,
            'date' => date('Y/m/d'),
        ];
        $config = [
            'format' => 'A4',
            'orientation' => $orientation,
            'author' => 'آی‌تی‌تلکام',
            'subject' => 'آی‌تی‌تلکام',
            'keywords' => 'آی‌تی‌تلکام',
            'creator' => 'آی‌تی‌تلکام',
            'instanceConfigurator' => function ($pdf) {
            }
        ];
        $pdf = PDF::loadView('admin.pages.invoice.pdf.' . $view, $data, [], $config);
        $document_name = 'Invoice-' . $order_no . '-ittelecom.pdf';
        return $pdf->stream($document_name);
    }

    protected function validateInvoice(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|max:150',
            'company_id' => 'required',
            'invoice_type' => 'required',
        ], [
            'company_id.required' => 'لطفا " نام فروشنده " را انتخاب کنید. ',
            'invoice_type.required' => 'لطفا " نوع فاکتور " را تعیین کنید. ',
            'customer_name.required' => 'لطفا " نام خریدار (شخص حقیقی/حقوقی) " را وارد کنید. ',
        ]);
    }
}
