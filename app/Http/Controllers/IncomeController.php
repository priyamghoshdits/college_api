<?php

namespace App\Http\Controllers;

use App\Http\Resources\IncomeResource;
use App\Models\Income;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function get_income()
    {
        $data = Income::get();
        return response()->json(['success'=>1,'data'=>IncomeResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_income(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new Income();
        $data->income_head_id = $requestedData->income_head_id;
        $data->name = $requestedData->name;
        $data->invoice_number = $requestedData->invoice_number;
        $data->date = $requestedData->date;
        $data->amount = $requestedData->amount;
        $data->description = $requestedData->description;
        $data->save();
        return response()->json(['success'=>1,'data'=>new IncomeResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_income(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = Income::find($requestedData->id);
        $data->income_head_id = $requestedData->income_head_id;
        $data->name = $requestedData->name;
        $data->invoice_number = $requestedData->invoice_number;
        $data->date = $requestedData->date;
        $data->amount = $requestedData->amount;
        $data->description = $requestedData->description;
        $data->update();
        return response()->json(['success'=>1,'data'=>new IncomeResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_income($id)
    {
        $data = Income::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>new IncomeResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        //
    }
}
