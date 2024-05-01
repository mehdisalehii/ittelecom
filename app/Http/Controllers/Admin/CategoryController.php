<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class CategoryController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('content_view') ) {
            abort(401);
        }
        return view('admin.pages.category.index');
    }
    public function product()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('content_view') ) {
            abort(401);
        }
        $menus = Menu::orderBy('sort','ASC')->where('type','=','product')->where('parent','==','0')->get();
        return view('admin.pages.category.product' , compact('menus'));
    }
    public function post()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('content_view') ) {
            abort(401);
        }
        $menus = Menu::orderBy('sort','ASC')->where('type','=','post')->where('parent','==','0')->get();
        return view('admin.pages.category.post' , compact('menus'));
    }
    public function forum()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('content_view') ) {
            abort(401);
        }
        $menus = Menu::orderBy('sort','ASC')->where('type','=','‌forum')->where('parent','==','0')->get();
        return view('admin.pages.category.‌forum' , compact('menus'));
    }

    public function save(Request $request)
    {
        $data = json_decode($request->data);
        function parseJsonArray($jsonArray, $parent = 0) {
          $return = array();
          foreach ($jsonArray as $subArray) {
            $returnSubSubArray = array();
            if (isset($subArray->children)) {
                $returnSubSubArray = parseJsonArray($subArray->children, $subArray->id);
            }
            $return[] = array(
                'id' => $subArray->id,
                'parent' => $parent)
            ;
            $return = array_merge($return, $returnSubSubArray);
          }
          return $return;
        }
        $readbleArray = parseJsonArray($data);
        $i=0;
        foreach($readbleArray as $row){
            $i++;
            $Menu = Menu::find($row['id']);
            $Menu->parent = $row['parent'];
            $Menu->sort = $i;
            $Menu->save();
        }
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $Menu = Menu::find($id);
        if (!is_null($Menu)) {
            $Menu->delete();
        }
    }

    public function save_menu(Request $request)
    {
        // return $request->val_data['sku'];
        $id = $request->val_data['id'];
        if ( $id  ){
            $Menu = Menu::find($id);
            $Menu->title = $request->val_data['label'];
            $Menu->slug = $request->val_data['slug'];
            $Menu->thumb = is_array($request->val_data['thumb']) ? implode(",", $request->val_data['thumb']): $request->val_data['thumb'];
            $Menu->class_name = $request->val_data['class_name'];
            $Menu->short_description = $request->val_data['short_description'];
            $Menu->content = $request->val_data['content'];
            $Menu->content_bottom = $request->val_data['content_bottom'];
            $Menu->type = $request->val_data['type'];
            $Menu->sku = $request->val_data['sku'];
            $Menu->save();
        } else {
            $Menu = new Menu();
            $Menu->title = $request->val_data['label'] ?? '' ;
            $Menu->slug = $request->val_data['slug'] ?? '' ;
            $Menu->thumb = is_array($request->val_data['thumb']) ? implode(",", $request->val_data['thumb']): $request->val_data['thumb'] ?? 'null.svg';
            $Menu->class_name = $request->val_data['class_name'] ?? '' ;
            $Menu->content = $request->val_data['content'];
            $Menu->content_bottom = $request->val_data['content_bottom'];
            $Menu->type = $request->val_data['type'] ?? '';
            $Menu->sku = $request->val_data['sku'] ?? '' ;
            $Menu->save();
        }
    }

}
