<?php

namespace App\Http\Controllers;

use App\Models\ManualScholarship;
use App\Http\Requests\StoreManualScholarshipRequest;
use App\Http\Requests\UpdateManualScholarshipRequest;
use Illuminate\Http\Request;

class ManualScholarshipController extends Controller
{
    public function save_manual_scholarship(Request $request)
    {
        foreach ($request['scholarship_array'] as $list) {
            $data = new ManualScholarship();
            $data->course_id = $list['course_id'];
            $data->semester_id = $list['semester_id'];
            $data->student_id = $list['student_id'];
            $data->type_of_scholarship = $list['type_of_scholarship'];
            $data->amount = $list['amount'];
            $data->save();
        }
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
    public function store(StoreManualScholarshipRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ManualScholarship $manualScholarship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManualScholarship $manualScholarship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManualScholarshipRequest $request, ManualScholarship $manualScholarship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ManualScholarship $manualScholarship)
    {
        //
    }
}
