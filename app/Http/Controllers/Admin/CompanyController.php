<?php
//
//namespace App\Http\Controllers\Admin;
//
//use App\Http\Controllers\Controller;
//use App\Models\Company;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Gate;
//use Illuminate\Support\Facades\Auth;
//
//class CompanyController extends \App\Http\Controllers\Controller
//{
//    public function index()
//    {
//        if (! Gate::allows('admin_panel') ) {
//            return abort(404);
//        }
//
//        if (! Gate::allows('admin_view') ) {
//            abort(401);
//        }
//
//        $companys = Company::orderBy('id','DESC')->get();
//        return view('admin.pages.company.index', compact('companys'));
//    }
//    public function create()
//    {
//        if (! Gate::allows('developer_view')) {
//            return abort(401);
//        }
//        return view('admin.pages.company.create');
//    }
//    public function store(Request $request)
//    {
//        if (! Gate::allows('admin_panel') ) {
//            return abort(404);
//        }
//
//        if (! Gate::allows('sale_create') ) {
//            abort(401);
//        }
//
//        $this->validateCompany($request);
//
//        $company = new Company();
//        $company->name = $request->name ;
//        $company->title = $request->title;
//        $company->number_last = str_replace( ',','', $request->number_last );
//        $company->economynum = $request->economynum;
//        $company->regnationalnum = $request->regnationalnum;
//        $company->email = $request->email;
//        $company->telnum = $request->telnum;
//        $company->fax = $request->fax;
//        $company->mobile = $request->mobile;
//        $company->adderss = $request->adderss;
//        $company->zipcode = $request->zipcode;
//        $company->save();
//
//        session()->flash('success', 'شرکت جدید اضافه شد.');
//
//        return redirect()->route('admin.company.index');
//    }
//    public function show(Company $company)
//    {
//        return abort(404);
//    }
//    public function edit($id)
//    {
//        if (! Gate::allows('admin_panel') ) {
//            return abort(404);
//        }
//
//        if (! Gate::allows('sale_edit') ) {
//            abort(401);
//        }
//
//        $company = Company::where('id', $id )->first();
//
//        if($company){
//            return view('admin.pages.company.edit', compact( 'company' ) );
//        }
//
//        abort(401);
//
//    }
//    public function update(Request $request, $id)
//    {
//        if (! Gate::allows('admin_panel') ) {
//            return abort(404);
//        }
//
//        if (! Gate::allows('sale_create') ) {
//            abort(401);
//        }
//
//        $this->validateCompany($request);
//
//        $company = Company::find($id);
//        $company->name = $request->name ;
//        $company->title = $request->title;
//        $company->number_last = str_replace( ',','', $request->number_last );
//        $company->economynum = $request->economynum;
//        $company->regnationalnum = $request->regnationalnum;
//        $company->email = $request->email;
//        $company->telnum = $request->telnum;
//        $company->fax = $request->fax;
//        $company->mobile = $request->mobile;
//        $company->adderss = $request->adderss;
//        $company->zipcode = $request->zipcode;
//        $company->save();
//
//        session()->flash('success', 'شرکت بروزرسانی شد.');
//        return back();
//    }
//    public function destroy(Request $request, $id)
//    {
//        abort(401);
//        if (! Gate::allows('admin_panel') ) {
//            return abort(404);
//        }
//
//        if (! Gate::allows('sale_delete') ) {
//            abort(401);
//        }
//
//        $company = Company::find($id);
//        if (!is_null($company)) {
//            $company->delete();
//        }
//        session()->flash('delete', 'شرکت موردنظر حذف شد.');
//        return redirect()->route('admin.company.index');
//    }
//    protected function validateCompany(Request $request)
//    {
//        $request->validate([
//            'name' => 'required|max:150',
//            'title' => 'required',
//            'number_last' => 'required',
//        ],[
//            'name.required' => 'لطفا " نام شرکت " را وارد کنید. ',
//            'title.required' => 'لطفا " نوع فاکتور " را انتخاب کنید. ',
//            'number_last.required' => 'لطفا " تعداد شرکت " را تعیین کنید. ',
//        ]);
//    }
//}
