<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use App\Models\Menu;
use App\Models\User;
use App\Models\Download;

use Illuminate\Support\Facades\File;
use PDF;
use Response;

class PdfController extends \App\Http\Controllers\Controller
{

    public function catalog($url) {
        // $file = resource_path().'/uploads/catalog/'. $url;
        // if (!File::exists($file)) {
        //     return abort(404);
        // }
        // // return Response::download($file, "filename.pdf" , ['Content-Type: application/pdf'] );
        // $file = File::get($file);
        // $response = Response::make($file,200);
        // return $response->header('Content-Type', 'application/pdf');
    }

}
