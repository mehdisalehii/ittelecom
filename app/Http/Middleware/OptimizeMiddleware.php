<?php
namespace App\Http\Middleware;
use Closure;

class OptimizeMiddleware {
        /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        
        if ( false && env('APP_OPTIMIZE') == 1 ) {

            /// check html or image
            if(strpos($response,'html') === false){
                return $response;
            }

            /// replace strings
            $buffer = $response->getContent();
            $buffer = preg_replace("/ +/", " ", $buffer);
            $buffer = preg_replace( array( "/>\n\s+</" , "/>\s+\n</" , "/> +</" ) , "><", $buffer);
            $buffer = preg_replace( "/[[:space:]]+</" , "\n<", $buffer);
            $buffer = preg_replace( array( "/\r/", "/\n/" , "/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/" ) , "", $buffer);

            /// compress 
            $response->setContent($buffer);
            // ini_set('zlib.output_compression', 'On'); // If you like to enable GZip, too!
            
        }

        return $response;
    }

}