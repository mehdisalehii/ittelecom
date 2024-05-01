<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use App\Models\Menu;
use App\Models\User;
use App\Models\Downloa;

use Illuminate\Support\Facades\File;
use Response;

class ZipController extends \App\Http\Controllers\Controller
{

    public function download($url) {
        // $file = resource_path().'/uploads/zip/'. $url;
        $file = storage_path().'/uploads/zip/'. $url;
        if (!File::exists($file)) {
            return abort(404);
        }
        return Response::download($file,  $url , ['Content-Type: application/zip'] );
    }

}
