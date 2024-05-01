<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class StockController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        $sum_stock = Stock::sum('number');
        $total_stock = count(Stock::select('id')->get());
        $stocks = Stock::orderBy('id','DESC')->get();
        return view('admin.pages.stock.index', compact('stocks','sum_stock','total_stock'));
    }
    public function create()
    {
        if (! Gate::allows('admin_panel')) {
            return abort(401);
        }
        return view('admin.pages.stock.create');
    }
    public function store(Request $request)
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        if (! Gate::allows('sale_create') ) {
            abort(401);
        }

        $this->validateStock($request);

        $stock = new Stock();
        $stock->part_no = $request->part_no ;
        $stock->title = $request->title;
        $stock->number = str_replace( ',','', $request->number );
        $stock->save();

        session()->flash('success', 'کالا جدید اضافه شد.');

        return redirect()->route('admin.stock.index');
    }
    public function show(Stock $stock)
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

        $stock = Stock::where('id', $id )->first();

        if($stock){
            return view('admin.pages.stock.edit', compact( 'stock' ) );
        }

        abort(401);

    }
    public function update(Request $request, $id)
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }

        if (! Gate::allows('sale_create') ) {
            abort(401);
        }

        $this->validateStock($request);

        $stock = Stock::find($id);
        $stock->part_no = $request->part_no ;
        $stock->title = $request->title;
        $stock->number = str_replace( ',','', $request->number );
        $stock->save();

        session()->flash('success', 'کالا بروزرسانی شد.');
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

        $stock = Stock::find($id);
        if (!is_null($stock)) {
            $stock->delete();
        }
        session()->flash('delete', 'کالا موردنظر حذف شد.');
        return redirect()->route('admin.stock.index');
    }
    protected function validateStock(Request $request)
    {
        $request->validate([
            'part_no' => 'required|max:150',
            'title' => 'required',
            'number' => 'required',
        ],[
            'part_no.required' => 'لطفا " پارت نامبر " را وارد کنید. ',
            'title.required' => 'لطفا " نام کالا " را انتخاب کنید. ',
            'number.required' => 'لطفا " تعداد کالا " را تعیین کنید. ',
        ]);
    }
}
