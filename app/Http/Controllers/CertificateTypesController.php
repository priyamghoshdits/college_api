<?php

namespace App\Http\Controllers;

use App\Models\CertificateTypes;
use App\Http\Requests\StoreCertificateTypesRequest;
use App\Http\Requests\UpdateCertificateTypesRequest;
use Illuminate\Http\Request;

class CertificateTypesController extends Controller
{
    public function get_certificate_types()
    {
        $certificateTypes = CertificateTypes::get();
        return response()->json(['success'=>1,'data'=>$certificateTypes], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_certificate_types(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $certificateTypes = new CertificateTypes();
        $certificateTypes->name = $requestedData->name;
        $certificateTypes->save();

        return response()->json(['success'=>1,'data'=>$certificateTypes], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_certificate_types(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $certificateTypes = CertificateTypes::find($requestedData->id);
        $certificateTypes->name = $requestedData->name;
        $certificateTypes->update();
        return response()->json(['success'=>1,'data'=>$certificateTypes], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_certificate_types($id)
    {
        $certificateTypes = CertificateTypes::find($id);
        $certificateTypes->delete();

        return response()->json(['success'=>1,'data'=>$certificateTypes], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CertificateTypes $certificateTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertificateTypesRequest $request, CertificateTypes $certificateTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CertificateTypes $certificateTypes)
    {
        //
    }
}
