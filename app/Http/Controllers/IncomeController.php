<?php

namespace App\Http\Controllers;

use App\Http\Resources\IncomeResource;
use App\Models\Income;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function get_income_report(Request $request)
    {
        $data = (object)$request->json()->all();
        $return_data = DB::select("select * from incomes WHERE date(date) > ? and date(date) < ?;",[$data->from_date, $data->to_date]);

        return response()->json(['success'=>1,'data'=>IncomeResource::collection($return_data)], 200,[],JSON_NUMERIC_CHECK);
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
