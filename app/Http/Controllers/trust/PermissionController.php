<?php

namespace App\Http\Controllers\trust;

use App\Http\Controllers\Controller;
use App\Http\Requests\trust\StorePermissionRequest;
use App\Http\Requests\trust\UpdatePermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
     {
    //         $permissions = Permission::when($request->search, function ($q) use ($request) {
    //         $q->where(function ($q) use ($request) {
    //             $q->where('name', 'LIKE', "%{$request->search}%")
    //               ->orWhere('guard_name', 'LIKE', "%{$request->search}%"); // Guard بدل table
    //         });
    //     })->paginate();

    $permissions = Permission::all();
        return view('admin.trust.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trust.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        $permissions = Permission::create($request->validated());
        return redirect()->route('permissions.index')->with('success', __('permission added successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view('admin.trust.permission.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('admin.trust.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        return redirect()->route('permissions.index')->with('success', __('Permission updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', __('permission deleted successfully'));
    }
}
