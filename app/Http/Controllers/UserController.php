<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all(); // Get all roles to display in the create form
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
       $user = User::create($request->validated());
       $user->assignRole($request->role);
        return redirect()->route('users.index')->with('success', __('User created successfully!'));

    }

    public function edit(User $user)
    {
        $roles = Role::all(); // Get all roles to display in the edit form
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->syncRoles([$request->role]); // syncRoles بيشيل أي Roles قديمة ويضيف الجديد
        return redirect()->route('users.index')->with('success', __('User updated successfully!'));


    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', __('User deleted successfully!'));
    }
}
