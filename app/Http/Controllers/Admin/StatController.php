<?php
//
//namespace App\Http\Controllers\Admin;
//
//use App\Models\Stat;
//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Gate;
//use Illuminate\Support\Facades\Auth;
//
//use Carbon\Carbon;
//
//class StatController extends \App\Http\Controllers\Controller
//{
//    public function index()
//    {
//        if (! Gate::allows('admin_panel') ) {
//            return abort(404);
//        }
//        $stats = Stat::orderBy('id','DESC')->whereDate('created_at', Carbon::today())->get();
//        return view('admin.pages.stat.index', compact('stats'));
//    }
//
//    public function date($date)
//    {
//        if (! Gate::allows('admin_panel') ) {
//            return abort(404);
//        }
//        return view('admin.pages.stat.date',compact('date'));
//    }
//
//    public function ip($ip)
//    {
//        if (! Gate::allows('admin_panel') ) {
//            return abort(404);
//        }
//        // $ip = '49.35.41.195'; //For static IP address get
//        //$ip = request()->ip(); //Dynamic IP address get
//        $data = \Location::get($ip);
//        return view('admin.pages.stat.ip',compact('data','ip'));
//    }
//
//}
