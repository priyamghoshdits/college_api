<?php

namespace App\Http\Controllers;

use App\Models\Postal;
use App\Http\Requests\StorePostalRequest;
use App\Http\Requests\UpdatePostalRequest;
use Illuminate\Http\Request;

class PostalController extends Controller
{
    public function get_postal_dispatch()
    {
        $postalDispatch = Postal::wherePostalType('postal dispatch')->get();
        return response()->json(['success'=>1,'data'=>$postalDispatch], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_postal_receive()
    {
        $postalReceive = Postal::wherePostalType('postal receive')->get();
        return response()->json(['success'=>1,'data'=>$postalReceive], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_postal(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $postal = new Postal();
        $postal->postal_type = $requestData->postal_type;
        $postal->from_title = $requestData->from_title;
        $postal->reference_no = $requestData->reference_no;
        $postal->address = $requestData->address;
        $postal->note = $requestData->note;
        $postal->to_title = $requestData->to_title;
        $postal->date = $requestData->date;
        $postal->save();
        return response()->json(['success'=>1,'data'=>$postal], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_postal(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $postal = Postal::find($requestData->id);
        $postal->postal_type = $requestData->postal_type;
        $postal->from_title = $requestData->from_title;
        $postal->reference_no = $requestData->reference_no;
        $postal->address = $requestData->address;
        $postal->note = $requestData->note;
        $postal->to_title = $requestData->to_title;
        $postal->date = $requestData->date;
        $postal->update();
        return response()->json(['success'=>1,'data'=>$postal], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Postal $postal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostalRequest $request, Postal $postal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postal $postal)
    {
        //
    }
}
