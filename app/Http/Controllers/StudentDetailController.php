<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\PreAdmissionPayment;
use App\Models\StudentDetail;
use App\Http\Requests\StoreStudentDetailRequest;
use App\Http\Requests\UpdateStudentDetailRequest;
use App\Models\User;

class StudentDetailController extends Controller
{
    public function refund_student($id)
    {
        $payment = PreAdmissionPayment::whereUserId($id)->first();
        $payment->refund = 1;
        $payment->update();

        $member = User::select('*','student_details.id as student_details_id','users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->leftjoin('pre_admission_payments', 'pre_admission_payments.id', '=', 'student_details.pre_admission_payment_id')
            ->where('users.id',$id)
            ->first();

        return response()->json(['success'=>1,'data'=>new StudentResource($member)], 200,[],JSON_NUMERIC_CHECK);
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
    public function store(StoreStudentDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentDetail $studentDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentDetail $studentDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentDetailRequest $request, StudentDetail $studentDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentDetail $studentDetail)
    {
        //
    }
}
