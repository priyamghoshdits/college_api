<?php

namespace App\Http\Controllers;

use App\Models\AdmissionEnquiry;
use App\Http\Requests\StoreAdmissionEnquiryRequest;
use App\Http\Requests\UpdateAdmissionEnquiryRequest;
use App\Models\StudentEnquiry;
use Illuminate\Http\Request;

class AdmissionEnquiryController extends Controller
{
    public function get_admission_enquiry()
    {
        $admissionEnquiry = AdmissionEnquiry::get();
        return response()->json(['success'=>1,'data'=>$admissionEnquiry], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_admission_enquiry(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $admissionEnquiry = new AdmissionEnquiry();
        $admissionEnquiry->name = $requestData->name;
        $admissionEnquiry->phone = $requestData->phone;
        $admissionEnquiry->email = $requestData->email;
        $admissionEnquiry->address = $requestData->address;
        $admissionEnquiry->description = $requestData->description;
        $admissionEnquiry->note = $requestData->note;
        $admissionEnquiry->date = $requestData->date;
        $admissionEnquiry->follow_up_date = $requestData->follow_up_date;
        $admissionEnquiry->reference = $requestData->reference;
        $admissionEnquiry->source = $requestData->source;
        $admissionEnquiry->course = $requestData->course;
        $admissionEnquiry->save();
        return response()->json(['success'=>1,'data'=>$admissionEnquiry], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_admission_enquiry(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $admissionEnquiry = AdmissionEnquiry::find($requestData->id);
        $admissionEnquiry->name = $requestData->name;
        $admissionEnquiry->phone = $requestData->phone;
        $admissionEnquiry->email = $requestData->email;
        $admissionEnquiry->address = $requestData->address;
        $admissionEnquiry->description = $requestData->description;
        $admissionEnquiry->note = $requestData->note;
        $admissionEnquiry->date = $requestData->date;
        $admissionEnquiry->follow_up_date = $requestData->follow_up_date;
        $admissionEnquiry->reference = $requestData->reference;
        $admissionEnquiry->source = $requestData->source;
        $admissionEnquiry->course = $requestData->course;
        $admissionEnquiry->update();
        return response()->json(['success'=>1,'data'=>$admissionEnquiry], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_admission_enquiry($id)
    {
        $admissionEnquiry = AdmissionEnquiry::find($id);
        $admissionEnquiry->delete();
        return response()->json(['success'=>1,'data'=>$admissionEnquiry], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdmissionEnquiry $admissionEnquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdmissionEnquiryRequest $request, AdmissionEnquiry $admissionEnquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdmissionEnquiry $admissionEnquiry)
    {
        //
    }
}
