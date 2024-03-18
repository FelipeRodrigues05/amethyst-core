<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Exception;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CompanyResource(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        try {
            $request->validated();

            Company::create($request->all());

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
    public function show(string $id)
    {
        try {
            $company = Company::findOrFail($id)->get();

            return response()->json([
                'success' => true,
                'company' => new CompanyResource($company),
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company, string $id)
    {
        try {
            $request->validated();

            Company::findOrFail($id)->update($request->all());

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
    public function destroy(Company $company, string $id)
    {
        try {
            Company::findOrFail($id)->delete();

            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
