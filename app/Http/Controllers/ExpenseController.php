<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExpenseResource;
use App\Models\Expense;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function get_expense()
    {
        $data = Expense::get();
        return response()->json(['success'=>1,'data'=>ExpenseResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_expense(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new Expense();
        $data->expense_head_id = $requestedData->expense_head_id;
        $data->name = $requestedData->name;
        $data->invoice_number = $requestedData->invoice_number;
        $data->date = $requestedData->date;
        $data->amount = $requestedData->amount;
        $data->description = $requestedData->description;
        $data->save();
        return response()->json(['success'=>1,'data'=>new ExpenseResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_expense(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = Expense::find($requestedData->id);
        $data->expense_head_id = $requestedData->expense_head_id;
        $data->name = $requestedData->name;
        $data->invoice_number = $requestedData->invoice_number;
        $data->date = $requestedData->date;
        $data->amount = $requestedData->amount;
        $data->description = $requestedData->description;
        $data->update();
        return response()->json(['success'=>1,'data'=>new ExpenseResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_expense($id)
    {
        $data = Expense::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>new ExpenseResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
