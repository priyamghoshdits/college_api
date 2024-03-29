<?php

namespace App\Http\Controllers;

use App\Models\GeneratedPayroll;
use App\Http\Requests\StoreGeneratedPayrollRequest;
use App\Http\Requests\UpdateGeneratedPayrollRequest;
use App\Models\PayrollDeduction;
use App\Models\PayrollEarnings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneratedPayrollController extends Controller
{
    public function save_payroll(Request $request)
    {
        $data = (object)$request->json()->all();
        DB::beginTransaction();
        try {

            $payroll = new GeneratedPayroll();
            $payroll->month = $data->member_payroll_form['month'];
            $payroll->year =  $data->member_payroll_form['year'];
            $payroll->staff_id = $data->member_payroll_form['staff_id'];
            $payroll->gross_salary = $data->member_payroll_form['gross_salary'];
            $payroll->net_salary = $data->member_payroll_form['net_salary'];
            $payroll->total_present = $data->member_payroll_form['total_present'];
            $payroll->total_absent = $data->member_payroll_form['total_absent'];
            $payroll->total_leave = $data->member_payroll_form['total_leave'];
            $payroll->deduction = $data->member_payroll_form['deduction'];
            $payroll->status = 1;
            $payroll->save();

            foreach ($data->earnings as $earning){
                $payrollEarnings = new PayrollEarnings();
                $payrollEarnings->payroll_id = $payroll->id;
                $payrollEarnings->payroll_type_id = $earning['payroll_type_id'];
                $payrollEarnings->amount = $earning['amount'];
                $payrollEarnings->save();
            }

            foreach ($data->deductions as $deduction){
                $payrollDeduction = new PayrollDeduction();
                $payrollDeduction->payroll_id = $payroll->id;
                $payrollDeduction->payroll_type_id = $deduction['payroll_type_id'];
                $payrollDeduction->amount = $deduction['amount'];
                $payrollDeduction->save();
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 200);
        }


        return response()->json(['success'=>1,'data'=> $data->member_payroll_form], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function save_proceed_to_pay(Request $request)
    {
        $data = (object)$request->json()->all();
        $generatedPayroll = GeneratedPayroll::find($data->id);
        $generatedPayroll->payment_mode = $data->payment_mode;
        $generatedPayroll->payment_date = $data->payment_date;
        $generatedPayroll->status = 2;
        $generatedPayroll->update();

        return response()->json(['success'=>1,'data'=> $generatedPayroll], 200,[],JSON_NUMERIC_CHECK);
    }

    public function revert_proceed_to_pay($id)
    {
        $generatedPayroll = GeneratedPayroll::find($id);
        $generatedPayroll->status = 1;
        $generatedPayroll->update();
        return response()->json(['success'=>1,'data'=> $generatedPayroll], 200,[],JSON_NUMERIC_CHECK);
    }

    public function revert_generate($id)
    {
        $generatedPayroll = GeneratedPayroll::find($id);
        $generatedPayroll->delete();
        return response()->json(['success'=>1], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     */
    public function show(GeneratedPayroll $generatedPayroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneratedPayroll $generatedPayroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGeneratedPayrollRequest $request, GeneratedPayroll $generatedPayroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeneratedPayroll $generatedPayroll)
    {
        //
    }
}
