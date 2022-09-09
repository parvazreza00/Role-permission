<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('admin.permissions.index' ,compact('permissions'));
    }

    public function create(){
        return view('admin.permissions.create');
    }

    public function store(Request $request){
        $validateData = $request->validate(['name' => 'required']);
        Permission::create($validateData);
        return to_route('admin.permissions.index');
    }

    public function edit(Permission $permission){
        return view('admin.permissions.edit', compact('permission'));

    }

    public function update(Request $request, Permission $permission){
        $validateData = $request->validate(['name' => 'required']);
        $permission->update($validateData);
        return to_route('admin.permissions.index');
    }
}
