<?php 
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
class ForceHTTPS {
    public function handle($request, Closure $next)
    {
      if ( env('FORCE_HTTPS') == 1  ) {
        if (!$request->isSecure()) {
            return redirect()->secure($request->getRequestUri());
        }
      }
      return $next($request);
    }
}