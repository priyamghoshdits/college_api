<?php

namespace App\Http\Controllers;

use App\Models\CompanyDetail;
use App\Http\Requests\StoreCompanyDetailRequest;
use App\Http\Requests\UpdateCompanyDetailRequest;
use Illuminate\Http\Request;

class CompanyDetailController extends Controller
{
    public function get_company_details()
    {
        $company = CompanyDetail::get();
        return response()->json(['success' => 1, 'data' => $company], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_company_details(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $companyDetails = new CompanyDetail();
        $companyDetails->name = $requestedData->name;
        $companyDetails->phone = $requestedData->phone;
        $companyDetails->contact_person_name = $requestedData->contact_person_name;
        $companyDetails->address = $requestedData->address;
        $companyDetails->description = $requestedData->description;
        $companyDetails->save();

        return response()->json(['success' => 1, 'data' => $companyDetails], 200, [], JSON_NUMERIC_CHECK);
    }
    public function update_company_details(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $companyDetails = CompanyDetail::find($requestedData->id);
        $companyDetails->name = $requestedData->name;
        $companyDetails->phone = $requestedData->phone;
        $companyDetails->contact_person_name = $requestedData->contact_person_name;
        $companyDetails->address = $requestedData->address;
        $companyDetails->description = $requestedData->description ?? null;
        $companyDetails->update();

        return response()->json(['success' => 1, 'data' => $companyDetails], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_company_details($id)
    {
        $companyDetails = CompanyDetail::find($id);
        $companyDetails->delete();

        return response()->json(['success' => 1, 'data' => $companyDetails], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyDetail $companyDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyDetailRequest $request, CompanyDetail $companyDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyDetail $companyDetail)
    {
        //
    }
}
