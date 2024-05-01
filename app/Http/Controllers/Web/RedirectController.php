<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;

class RedirectController extends Controller
{
    function allAMPPages(Request $request){
        $segments = $request->segments();
        array_pop($segments);
        $new_url = url(sprintf('/%s', implode('/', $segments)));
        return Redirect::to($new_url, 302);
    }
}
