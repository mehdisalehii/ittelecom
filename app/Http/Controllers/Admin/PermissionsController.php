<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePermissionsRequest;
use App\Http\Requests\Admin\UpdatePermissionsRequest;

class PermissionsController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        if (! Gate::allows('admin_panel')) {
            return abort(401);
        }
        $permissions = Permission::all();
        return view('admin.pages.permissions.index', compact('permissions'));
    }
    public function create()
    {
        // if (! Gate::allows('admin_panel')) {
        //     return abort(401);
        // }
        // return view('admin.pages.permissions.create');
    }
    public function store(StorePermissionsRequest $request)
    {
        // if (! Gate::allows('admin_panel')) {
        //     return abort(401);
        // }
        // Permission::create($request->all());
        // return redirect()->route('admin.pages.permissions.index');
    }
    public function edit(Permission $permission)
    {
        // if (! Gate::allows('admin_panel')) {
        //     return abort(401);
        // }
        // return view('admin.pages.permissions.edit', compact('permission'));
    }
    public function update(UpdatePermissionsRequest $request, Permission $permission)
    {
        // if (! Gate::allows('admin_panel')) {
        //     return abort(401);
        // }
        // $permission->update($request->all());
        // return redirect()->route('admin.pages.permissions.index');
    }
    public function destroy(Permission $permission)
    {
        abort(401);
        // if (! Gate::allows('admin_panel')) {
        //     return abort(401);
        // }
        // $permission->delete();
        // return redirect()->route('admin.pages.permissions.index');
    }
    public function show(Permission $permission)
    {
        // if (! Gate::allows('admin_panel')) {
        //     return abort(401);
        // }
        // return view('admin.pages.permissions.show', compact('permission'));
    }
    public function massDestroy(Request $request)
    {
        // Permission::whereIn('id', request('ids'))->delete();
        // return response()->noContent();
    }

}
