<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class AnnualLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annualLeaves = Employee::select('id', 'first_name', 'last_name', 'total_annual_leave', 'used_annual_leave', 'remain_annual_leave')->orderBy('id','desc')->get();

      
        return view('admin.pages.annualleave.index', compact('annualLeaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.pages.annualleave.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'total_annual_leave' => 'required|numeric|min:0',
            'used_annual_leave' => 'required|numeric|min:0',
            'remain_annual_leave' => 'required|numeric|min:0',
        ]);

        $employee->update([
            'total_annual_leave' => $validated['total_annual_leave'],
            'used_annual_leave' => $validated['used_annual_leave'],
            'remain_annual_leave' => $validated['remain_annual_leave'],
        ]);

        return redirect()->route('annualleave.index')->with('success', 'Annual leave updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
