<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BrowseController extends \App\Http\Controllers\Controller
{
    public function BrowsePage(){ 
        return view('web.browse' );
    }
}
