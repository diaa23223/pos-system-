<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\EmployeeManagement;
use Illuminate\Http\Request;

class EmployeeManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $employees = EmployeeManagement::all();
        return view('admin.employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        EmployeeManagement::create($request->validated());
        return redirect()->route('employees.index')->with('success', __('added employee successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeeManagement $employee)
    {
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeManagement $employee)
    {
        return view('admin.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, EmployeeManagement $employee)
    {
        $employee->update($request->validated());

        return redirect()->route('employees.index')->with('success', __('employee updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeManagement $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', __('employee updated successfully'));
    }
}
