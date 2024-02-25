<?php

namespace App\Http\Controllers;

use App\Models\IncomeHead;
use App\Http\Requests\StoreIncomeHeadRequest;
use App\Http\Requests\UpdateIncomeHeadRequest;
use Illuminate\Http\Request;

class IncomeHeadController extends Controller
{
    public function get_income_head()
    {
        $data = IncomeHead::get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_income_head(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new IncomeHead();
        $data->name = $requestedData->name;
        $data->description = $requestedData->description;
        $data->save();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_income_head(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = IncomeHead::find($requestedData->id);
        $data->name = $requestedData->name;
        $data->description = $requestedData->description;
        $data->update();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_income_head($id)
    {
        $data = IncomeHead::find($id);
        $data->delete();

        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncomeHead $incomeHead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeHeadRequest $request, IncomeHead $incomeHead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncomeHead $incomeHead)
    {
        //
    }
}
