<?php

namespace App\Http\Controllers;

use App\Models\ManualScholarship;
use App\Http\Requests\UpdateManualScholarshipRequest;
use App\Http\Resources\ManualScholarshipResource;
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
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_manual_scholarship(Request $request)
    {
        foreach ($request['scholarship_array'] as $list) {
            $data = ManualScholarship::find($list['id']);
            if ($data) {
                $data->course_id = $list['course_id'];
                $data->semester_id = $list['semester_id'];
                $data->student_id = $list['student_id'];
                $data->type_of_scholarship = $list['type_of_scholarship'];
                $data->amount = $list['amount'];
                $data->update();
            } else {
                $data = new ManualScholarship();
                $data->course_id = $list['course_id'];
                $data->semester_id = $list['semester_id'];
                $data->student_id = $list['student_id'];
                $data->type_of_scholarship = $list['type_of_scholarship'];
                $data->amount = $list['amount'];
                $data->save();
            }
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_manual_scholarship($id)
    {
        $data = ManualScholarship::find($id);
        $data->delete();

        $manual_scholarship = ManualScholarship::get();


        return response()->json(['success' => 1, 'data' => ManualScholarshipResource::collection($manual_scholarship)], 200, [], JSON_NUMERIC_CHECK);
    }


    public function get_manual_scholarship(Request $request)
    {
        $manual_scholarship = ManualScholarship::where(['course_id' => $request['course_id'], 'semester_id' => $request['semester_id'], 'student_id' => $request['student_id']])->get();

        return response()->json(['success' => 1, 'data' => ManualScholarshipResource::collection($manual_scholarship)], 200, [], JSON_NUMERIC_CHECK);
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
