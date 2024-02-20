<?php

namespace App\Http\Controllers;

use App\Models\PayrollTypes;
use App\Http\Requests\StorePayrollTypesRequest;
use App\Http\Requests\UpdatePayrollTypesRequest;
use Illuminate\Http\Request;

class PayrollTypesController extends Controller
{
    public function get_payroll_types()
    {
        $data = PayrollTypes::get();
        return response()->json(['success'=>1, 'data' => $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_payroll_types(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $payrollTypes = new PayrollTypes();
        $payrollTypes->name = $requestedData->name;
        $payrollTypes->save();
        return response()->json(['success'=>1, 'data' => $payrollTypes], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_payroll_types(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $payrollTypes = PayrollTypes::find($requestedData->id);
        $payrollTypes->name = $requestedData->name;
        $payrollTypes->update();
        return response()->json(['success'=>1, 'data' => $payrollTypes], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_payroll_types($id)
    {
        $payrollTypes = PayrollTypes::find($id);
        $payrollTypes->delete();
        return response()->json(['success'=>1, 'data' => $payrollTypes], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PayrollTypes $payrollTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePayrollTypesRequest $request, PayrollTypes $payrollTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PayrollTypes $payrollTypes)
    {
        //
    }
}
