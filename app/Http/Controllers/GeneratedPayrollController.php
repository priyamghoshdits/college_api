<?php

namespace App\Http\Controllers;

use App\Models\GeneratedPayroll;
use App\Http\Requests\StoreGeneratedPayrollRequest;
use App\Http\Requests\UpdateGeneratedPayrollRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GeneratedPayrollController extends Controller
{
    public function save_payroll(Request $request)
    {
        $data = (object)$request->json()->all();
        $payroll = new GeneratedPayroll();
        $payroll->month = $data->month;
        $payroll->year =  $data->year;
        $payroll->staff_id = $data->staff_id;
        $payroll->basic_salary = $data->basic_salary;
        $payroll->gross_salary = $data->gross_salary;
        $payroll->net_salary = $data->net_salary;
        $payroll->total_present = $data->total_present;
        $payroll->total_absent = $data->total_absent;
        $payroll->total_leave = $data->total_leave;
        $payroll->deduction = $data->deduction;
        $payroll->tax = $data->tax;
        $payroll->save();

        return response()->json(['success'=>1,'data'=> $payroll], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGeneratedPayrollRequest $request)
    {
        //
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
