<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;

use App\Models\Menu;
use App\Models\User;
use App\Models\Company;
use App\Models\Download;

use Image;
use PDF;
use Response;

class UploadController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (!Gate::allows('content_view')) {
            abort(401);
        }
        return view('admin.pages.upload.index');
    }

    public function post()
    {
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (!Gate::allows('content_view')) {
            abort(401);
        }
        $limit = '۲ مگابایت';
        if (Gate::allows('admin_view')) {
            $limit = '۱۵ مگابایت';
        }
        $type = 'post';
        Artisan::call('ittelecom:rebuild-images');
        return view('admin.pages.upload.post', compact('limit', 'type'));
    }

    public function postStore(Request $request)
    {
        Artisan::call('ittelecom:rebuild-images');
        $limit = '۲ مگابایت';
        $max = '2000';
        if (Gate::allows('admin_view')) {
            $limit = '۱۵ مگابایت';
            $max = '15000';
        }

        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif|max:' . $max,
        ], [
            'file.mimes' => 'لطفا فرمت فایل تصویری مانند: jpeg , png , jpg , gif آپلود کنید.',
            'file.max' => 'لطفا حجم فایل تصویر کمتر از ' . $limit . ' آپلود کنید.',
        ]);

        $fileName = str_replace('.' . $request->file->extension(), '', $request->file->getClientOriginalName());

        $post_path_folder = str_replace('/images/', '', config("path.images.post"));

        if ($fileName) {
            $imageName = $fileName . '-' . time() . '.' . $request->file->extension();
            $filename_w = $fileName . '-' . time();
            $ext = $request->file->extension();
            $size = $request->file->getSize();
            // $request->file->storeAs('images', $imageName); // storage/app/images/file.png
            // $request->file->move(resource_path( $post_path_folder ), $imageName); // public/dl/images/post/file.png
            $request->file->move(storage_path($post_path_folder), $imageName); // public/dl/images/post/file.png

            /// Size 800*400 to 600*400 With WaterMark
            // $image_crop = Image::make(public_path( $post_path_folder.'/'. $imageName  ));
            // $image_crop->crop(600,400,null,null); /// width,height,x,y
            // $image_crop->resize(300,null);
            // $image_crop->insert(public_path( config("path.dists.logo") . '/logo.png'), 'top-right', 0, 15);
            // $image_crop->encode('jpg');
            // $image_crop->save(public_path( config("path.images.postThumb").'/crop-'. $imageName ));

            // Watermark
            // $Watermark = Image::make(resource_path( $post_path_folder.'/'. $imageName  ));
            $Watermark = Image::make(storage_path($post_path_folder . '/' . $imageName));
            $Watermark->insert(public_path("watermark/post.png"), 'top-right', 0, 15);
            $Watermark->encode('jpg');
            // $Watermark->save(resource_path( $post_path_folder.'/'. $imageName ));
            $Watermark->save(storage_path($post_path_folder . '/' . $imageName));

            // Save on DB
            $Download = new Download();
            $Download->filename = $filename_w ? $filename_w : '-Untitled-';
            $Download->size = $size ? $size : '-None-';
            $Download->ext = $ext ? $ext : '-Unknown-';
            $Download->type = 'post';
            $Download->save();

            return back()->with('success', 'فایل عکس مقاله با موفقیت آپلود شد.')->with('file', $imageName)->with('size', $size);
        }

    }

    public function product()
    {
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (!Gate::allows('content_view')) {
            abort(401);
        }
        $limit = '۲ مگابایت';
        if (Gate::allows('admin_view')) {
            $limit = '۱۵ مگابایت';
        }
        $type = 'product';
        Artisan::call('ittelecom:rebuild-images');
        return view('admin.pages.upload.product', compact('limit', 'type'));
    }

    public function productStore(Request $request)
    {
        Artisan::call('ittelecom:rebuild-images');
        $limit = '۲ مگابایت';
        $max = '2000';
        if (Gate::allows('admin_view')) {
            $limit = '۱۵ مگابایت';
            $max = '15000';
        }

        $request->validate([
            'file' => 'required|mimes:jpeg,jpg|max:' . $max,
        ], [
            'file.mimes' => 'لطفا فرمت فایل تصویری مانند: jpeg , jpg آپلود کنید.',
            'file.max' => 'لطفا حجم فایل تصویر کمتر از ' . $limit . ' آپلود کنید.',
        ]);

        $fileName = str_replace('.' . $request->file->extension(), '', $request->file->getClientOriginalName());

        $product_path_folder = str_replace('/images/', '', config("path.images.product"));

        if ($fileName) {
            $imageName = $fileName . '-' . time() . '.' . $request->file->extension();
            $filename_w = $fileName . '-' . time();
            $ext = $request->file->extension();
            $size = $request->file->getSize();
            // $request->file->storeAs('images', $imageName); // storage/app/images/file.png
            // $request->file->move(resource_path( $product_path_folder ), $imageName); // public/dl/images/product/file.png
            $request->file->move(storage_path($product_path_folder), $imageName); // public/dl/images/product/file.png

            /// Size 1080 With WaterMark
            // $img_watemark = Image::make(resource_path( $product_path_folder.'/'. $imageName  ));
            $img_watemark = Image::make(storage_path($product_path_folder . '/' . $imageName));
            // $img_watemark->insert(public_path( config("path.dists.logo") . '/logo.png'), 'top-left', 0, 0);
            // $img_watemark->encode('jpg');
            // $img_watemark->save(resource_path( $product_path_folder.'/'. $imageName ));
            $img_watemark->save(storage_path($product_path_folder . '/' . $imageName));

            // Save on DB
            $Download = new Download();
            $Download->filename = $filename_w ? $filename_w : '-Untitled-';
            $Download->size = $size ? $size : '-None-';
            $Download->ext = $ext ? $ext : '-Unknown-';
            $Download->type = 'product';
            $Download->save();

            return back()->with('success', 'عکس محصول با موفقیت آپلود شد.')->with('file', $imageName)->with('size', $size);
        }

    }

    public function pdf()
    {
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (!Gate::allows('content_view')) {
            abort(401);
        }
        $limit = '۲ مگابایت';
        if (Gate::allows('admin_view')) {
            $limit = '۱۵ مگابایت';
        }
        $type = 'pdf';
        return view('admin.pages.upload.pdf', compact('limit', 'type'));
    }

    public function pdfStore(Request $request)
    {
        Artisan::call('ittelecom:rebuild-images');
        $limit = '۲ مگابایت';
        $max = '2000';
        if (Gate::allows('admin_view')) {
            $limit = '۱۵ مگابایت';
            $max = '15000';
        }

        $request->validate([
            'file' => 'required|mimes:pdf|max:' . $max, //doc,docx,pdf,txt
        ], [
            'file.mimes' => 'لطفا فرمت فایل تصویری مانند: pdf آپلود کنید.',
            'file.max' => 'لطفا حجم فایل تصویر کمتر از ' . $limit . ' آپلود کنید.',
        ]);

        $files = $request->file('file');
        if ($files) {
            // $filename = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $filename = str_replace('.' . $files->extension(), '', $files->getClientOriginalName());
            $filename_ext = $filename . '.' . $files->extension();
            $filename_w = $filename;
            $ext = $files->extension();
            $size = $files->getSize();
            $files->move(public_path('dl/catalog'), $filename_ext); /// 'dl/catalog'

            $insert['file'] = "$filename";

            // Save on DB
            $Download = new Download();
            $Download->filename = $filename_w ? $filename_w : '-Untitled-';
            $Download->size = $size ? $size : '-None-';
            $Download->ext = $ext ? $ext : '-Unknown-';
            $Download->type = 'pdf';
            $Download->save();

            return back()->with('success', 'فایل PDF موردنظر با موفقیت آپلود شد.')->with('file', $filename_ext)->with('size', $size);
        }
    }

    public function zip()
    {
        if (!Gate::allows('admin_panel')) {
            return abort(404);
        }
        if (!Gate::allows('content_view')) {
            abort(401);
        }
        $limit = '۲ مگابایت';
        if (Gate::allows('admin_view')) {
            $limit = '۱۵ مگابایت';
        }
        $type = 'zip';
        return view('admin.pages.upload.zip', compact('limit', 'type'));
    }

    public function zipStore(Request $request)
    {
        Artisan::call('ittelecom:rebuild-images');
        $limit = '۲ مگابایت';
        $max = '2000';
        if (Gate::allows('admin_view')) {
            $limit = '۱۵ مگابایت';
            $max = '15000';
        }

        $request->validate([
            'file' => 'required|mimes:zip,rar|max:' . $max, //doc,docx,pdf,txt
        ], [
            'file.mimes' => 'لطفا فرمت فایل تصویری مانند: zip , rar آپلود کنید.',
            'file.max' => 'لطفا حجم فایل تصویر کمتر از ' . $limit . ' آپلود کنید.',
        ]);

        $files = $request->file('file');
        if ($files) {
            // $filename = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $filename = str_replace('.' . $files->extension(), '', $files->getClientOriginalName());
            $filename_ext = $filename . '.' . $files->extension();
            $filename_w = $filename;
            $ext = $files->extension();
            $size = $files->getSize();
            $files->move(storage_path('uploads/zip'), $filename_ext); /// 'dl/zip'
            $insert['file'] = "$filename";

            // Save on DB
            $Download = new Download();
            $Download->filename = $filename_w ? $filename_w : '-Untitled-';
            $Download->size = $size ? $size : '-None-';
            $Download->ext = $ext ? $ext : '-Unknown-';
            $Download->type = 'pdf';
            $Download->save();

            return back()->with('success', 'فایل زیپ موردنظر با موفقیت آپلود شد.')->with('file', $filename_ext)->with('size', $size);
        }
    }

    public function fetchTiny(Request $request)
    {
        Artisan::call('ittelecom:rebuild-images');
        $fileFormat = $request->file('file')->getClientOriginalExtension();
        $PhotoValidFormat = array('jpg', 'jpeg', 'png');
        if (in_array(strtolower($fileFormat), $PhotoValidFormat) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $PhotoName = uniqid() . '.' . $request->file('file')->getClientOriginalExtension();
            $fileSize = number_format($_FILES['file']['size'] / 1048576, 2);//to mb
            if ($fileSize <= 50) {
                // if ($request->file('file')->move( resource_path('uploads/picture/post') . env('Photo_News_UPLOAD_PATH'), $PhotoName )) {
                if ($request->file('file')->move(storage_path('uploads/picture/post') . env('Photo_News_UPLOAD_PATH'), $PhotoName)) {
                    $data = ['location' => route('home') . '/images/uploads/picture/post/' . $PhotoName];
                    return response()->json($data);
                } else
                    $res = -1;
            } //bad format or size not allowed for php.ini
            else {
                if (isset($_FILES['file']['error']) && $_FILES['file']['error'] == 1)
                    $res = -1;
                else
                    $res = 0;
            }
            echo json_encode(array('res' => $res));
        } else {
            echo json_encode('Format: JPG and PNG. Size: Min=1080px');
        }
    }

}
