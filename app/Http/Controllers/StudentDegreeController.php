<?php

namespace App\Http\Controllers;

use App\Models\StudentDegree;
use App\Http\Requests\StoreStudentDegreeRequest;
use App\Http\Requests\UpdateStudentDegreeRequest;
use Illuminate\Http\Request;

class StudentDegreeController extends Controller
{
    public function get_student_degree()
    {
        $data = StudentDegree::get();
        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_student_degree(Request $request)
    {
        $requestedData = (object)$request->json()->all();

        $data = new StudentDegree();
        $data->name = $requestedData->name;
        $data->save();

        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_student_degree(Request $request)
    {
        $requestedData = (object)$request->json()->all();

        $data = StudentDegree::find($requestedData->id);
        $data->name = $requestedData->name;
        $data->update();

        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_student_degree($id)
    {
        $data = StudentDegree::find($id);
        $data->delete();

        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentDegreeRequest $request, StudentDegree $studentDegree)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentDegree $studentDegree)
    {
        //
    }
}
