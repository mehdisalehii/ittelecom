<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;

use App\Models\User;

class RolesController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        if (! Gate::allows('admin_panel')) {
            return abort(401);
        }

        $roles = Role::all();

        return view('admin.pages.roles.index', compact('roles'));
    }
    public function create()
    {
        if (! Gate::allows('admin_panel')) {
            return abort(401);
        }
        $permissions = Permission::get()->pluck('name', 'name');

        return view('admin.pages.roles.create', compact('permissions'));
    }
    public function store(StoreRolesRequest $request)
    {
        if (! Gate::allows('admin_panel')) {
            return abort(401);
        }
        $role = Role::create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);

        return redirect()->route('admin.roles.index');
    }
    public function edit(Role $role)
    {
        if (! Gate::allows('admin_panel')) {
            return abort(401);
        }
        $permissions = Permission::get()->pluck('name', 'name');

        return view('admin.pages.roles.edit', compact('role', 'permissions'));
    }
    public function update(UpdateRolesRequest $request, Role $role)
    {
        if (! Gate::allows('admin_panel')) {
            return abort(401);
        }

        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);
        return back();
        // return redirect()->route('admin.roles.index');
    }
    public function show(Role $role)
    {
        if (! Gate::allows('admin_panel')) {
            return abort(401);
        }

        $role->load('permissions');

        return view('admin.pages.roles.show', compact('role'));
    }
    public function destroy(Role $role)
    {
        abort(401);
        if (! Gate::allows('admin_panel')) {
            return abort(401);
        }

        $role->delete();

        return redirect()->route('admin.roles.index');
    }
    public function massDestroy(Request $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}
