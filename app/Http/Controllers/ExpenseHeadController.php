<?php

namespace App\Http\Controllers;

use App\Models\ExpenseHead;
use App\Http\Requests\StoreExpenseHeadRequest;
use App\Http\Requests\UpdateExpenseHeadRequest;
use Illuminate\Http\Request;

class ExpenseHeadController extends Controller
{
    public function get_expense_head()
    {
        $data = ExpenseHead::get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_expense_head(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new ExpenseHead();
        $data->name = $requestedData->name;
        $data->description = $requestedData->description;
        $data->save();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_expense_head(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = ExpenseHead::find($requestedData->id);
        $data->name = $requestedData->name;
        $data->description = $requestedData->description;
        $data->update();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_expense_head($id)
    {
        $data = ExpenseHead::find($id);
        $data->delete();

        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpenseHead $expenseHead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseHeadRequest $request, ExpenseHead $expenseHead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseHead $expenseHead)
    {
        //
    }
}
