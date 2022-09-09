<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles =  Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }
    public function create(){
        return view('admin.roles.create');
    }

    public function store(Request $request){
        $validateData = $request->validate(['name' => ['required','min:3']]);
        Role::create($validateData);
        return to_route('admin.roles.index');
    }

    public function edit(Role $role){
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role){
        $validateData = $request->validate(['name' => ['required','min:3']]);
        $role->update($validateData);
        return to_route('admin.roles.index');
    }
}
