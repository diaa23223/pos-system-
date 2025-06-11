<?php

namespace App\Http\Controllers\trust;

use App\Http\Controllers\Controller;
use App\Http\Requests\trust\StoreRoleRequest;
use App\Http\Requests\trust\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $roles = Role::all();
       return view('admin.trust.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trust.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        Role::create($request->validated());
        return redirect()->route('roles.index')->with('success',__('role added successfully'));        
    }

    public function edit(Role $role)
    {
    return view('admin.trust.roles.edit',compact('role'));        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
       $role->update($request->validated());
       return redirect()->route('roles.index')->with('success',__('role updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index');
     }
}
