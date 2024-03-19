<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\DefaultCompanyResource;
use App\Models\Company;
use Exception;
use Illuminate\Http\Request;

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
    public function show(Company $company)
    {
        try {
            $company = Company::findOrFail($company->id);

            return response()->json([
                'success' => true,
                'company' => new DefaultCompanyResource($company),
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        try {
            $request->validated();

            Company::findOrFail($company->id)->update($request->all());

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
    public function destroy(Company $company)
    {
        try {
            Company::findOrFail($company->id)->delete();

            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
