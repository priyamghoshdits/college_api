<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiscountResource;
use App\Models\Discount;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function get_discount(Request $request)
    {
        $data = Discount::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=>DiscountResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_discount(Request $request)
    {
        $requestedData = (object)$request->json()->all();

        $data = new Discount();
        $data->student_id = $requestedData->student_id;
        $data->course_id = $requestedData->course_id;
        $data->semester_id = $requestedData->semester_id;
        $data->scholarship_code = $requestedData->scholarship_code;
        $data->amount = $requestedData->amount;
        $data->description = $requestedData->description;
        $data->franchise_id = $request->user()->franchise_id;
        $data->save();
        return response()->json(['success'=>1,'data'=>new DiscountResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_discount(Request $request)
    {
        $requestedData = (object)$request->json()->all();

        $data = Discount::find($requestedData->id);
        $data->student_id = $requestedData->student_id;
        $data->course_id = $requestedData->course_id;
        $data->semester_id = $requestedData->semester_id;
        $data->scholarship_code = $requestedData->scholarship_code;
        $data->amount = $requestedData->amount;
        $data->description = $requestedData->description;
        $data->update();
        return response()->json(['success'=>1,'data'=>new DiscountResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_discount($id)
    {
        $data = Discount::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>new DiscountResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        //
    }
}
