<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Exception;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new EmployeeResource(Employee::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        try {
            $request->validated();

            Employee::create($request->all());

            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee, string $id)
    {
        try {
            $employee = Employee::findOrFail($id)->get();

            return response()->json([
                'success' => true,
                'data' => $employee,
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee, string $id)
    {
        try {
            $request->validated();
            Employee::find($id)->update($request->all());

            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee, string $id)
    {
        try {
            Employee::findOrFail($id)->delete();

            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
