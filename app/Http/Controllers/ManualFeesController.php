<?php

namespace App\Http\Controllers;

use App\Http\Resources\ManualFeesResource;
use App\Models\ManualFees;
use App\Http\Requests\StoreManualFeesRequest;
use App\Http\Requests\UpdateManualFeesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ManualFeesController extends Controller
{
    public function save_manual_fees(Request $request)
    {
        $manualFees = new ManualFees();
        $manualFees->course_id = $request['course_id'];
        $manualFees->semester_id = $request['semester_id'];
        $manualFees->student_id = $request['student_id'];
        $manualFees->term_sem_id = $request['term_sem_id'];
        $manualFees->money_received_number = $request['money_received_number'];
        $manualFees->date_of_payment = $request['date_of_payment'];
        $manualFees->amount = $request['amount'];

        if ($files = $request->file('file')) {
            $destinationPath = public_path('/manual_fees/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $manualFees->file_name = $profileImage1;
        }
        dd($manualFees);

        $manualFees->save();

        return response()->json(['success' => 1, 'data' =>new ManualFeesResource($manualFees)], 200);
    }
    public function search_manual_fees(Request $request)
    {
        $manualFees = ManualFees::whereBetween('date_of_payment',[$request['from_date'],$request['to_date']])->get();

        return response()->json(['success' => 1, 'data' =>ManualFeesResource::collection($manualFees)], 200);
    }

    public function delete_manual_fees($id)
    {
        $manualFees = ManualFees::find($id);
        if (file_exists(public_path() . '/manual_payslips/' . $manualFees->file_name)) {
            File::delete(public_path() . '/manual_payslips/' . $manualFees->file_name);
        }
        $manualFees->delete();

//        $manualFee = ManualFees::get();
        return response()->json(['success' => 1, 'data' =>null], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(ManualFees $manualFees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManualFees $manualFees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManualFeesRequest $request, ManualFees $manualFees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ManualFees $manualFees)
    {
        //
    }
}
