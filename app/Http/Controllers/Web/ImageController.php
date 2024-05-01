<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Helpers\CacheHelper\Facades\CacheFacade;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Response;

class ImageController extends \App\Http\Controllers\Controller
{
    public function getImage( Request $request , $filepathname )
    {
        // return $filepathname;
        // $file_path = resource_path($filepathname);
        $file_path = storage_path($filepathname);

        if (!File::exists($file_path)) {
            $file_path = public_path($filepathname);
        }

        if (!File::exists($file_path)) {
            abort(404);
        }

        $storage_path = storage_path('temp-br/pictures/'); 
        $filename = pathinfo($filepathname, PATHINFO_FILENAME);
        $extension = pathinfo($filepathname, PATHINFO_EXTENSION);

        if (!file_exists($storage_path)) {
            mkdir($storage_path, 0755, true);
        }
        $mime_type = File::mimeType($file_path);

        $width = $request->w;
        $height = $request->h;
        $watermark = resource_path( '/watermark/product.png' );
        // $watermark = storage_path( '/watermark/product.png' );

        $url = $storage_path . '/' . $filename.'.'.$extension;

        if ($width && $height) {

            if ( $width=='orginal' && $height=='orginal' ){
                $img = Image::make($file_path);
                $img->save( $url ,100);
            } else {
                if ( $width>400 || $height>400 ){
                    try {
                        $img = Image::make($file_path)->resize( $width , $height );
                        $img->insert( $watermark , 'top-left', 0, 0);
                        $img->save( $url ,100);
                    } catch(\Throwable $throwable) {
                        \Log::warning('error in getImage');
                        \Log::warning($throwable->getMessage());
                        \Log::warning($file_path);
                        abort(404);
                    }
                } else {
                    $img = Image::make($file_path)->resize( $width , $height );
                    $img->save( $url ,90);
                }
            }

        } else { 
            // return abort(404);
            $img = Image::make($file_path);
            $img->save( $url ,100);
        }

        return response($img)->header('Content-type', $mime_type); 

    }

    public function svg($url) {
        $file = resource_path().'/dists/icons/'. $url;
        if (!File::exists($file)) {
            return abort(404);
        }
        $file = File::get($file);
        $response = Response::make($file,200);
        return $response->header('Content-Type', 'image/svg+xml');
    }

    /// Seo Error 404 --- Old Images
    public function getPostImageError($filepathname) {
        $file_path = storage_path($filepathname);
        $storage_path = storage_path('uploads/picture/post'); 
        $filename = pathinfo($filepathname, PATHINFO_FILENAME);
        $extension = pathinfo($filepathname, PATHINFO_EXTENSION);
        $url = $storage_path . '/' . $filename.'.'.$extension;
        if (!file_exists($url)) {
            abort(404);
        }
        $mime_type = File::mimeType($url);
        $img = Image::make($url);
        $img->save( $url ,100);
        return response($img)->header('Content-type', $mime_type); 
    }

}
