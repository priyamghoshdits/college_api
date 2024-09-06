<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClinicalTrainingResource;
use App\Models\ClinicalTraining;
use Illuminate\Http\Request;

class ClinicalTrainingController extends Controller
{
    public function save_clinical_traning(Request $request)
    {
        $clinical_training = new ClinicalTraining();
        $clinical_training->student_name = $request->student_name;
        $clinical_training->course_name = $request->course_name;
        $clinical_training->year_semester = $request->year_semester;
        $clinical_training->duration = $request->duration;
        $clinical_training->training_organization = $request->training_organization;

        if ($files = $request->file('training_file')) {
            $destinationPath = public_path('/clinical_training/');
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath, $file_name);
            $clinical_training->training_file = $file_name;
        }

        $clinical_training->save();

        return response()->json(['success' => 1, 'data' => new ClinicalTrainingResource($clinical_training)]);
    }

    public function update_clinical_traning(Request $request)
    {
        $clinical_training = ClinicalTraining::find($request->id);
        $clinical_training->student_name = $request->student_name;
        $clinical_training->course_name = $request->course_name;
        $clinical_training->year_semester = $request->year_semester;
        $clinical_training->duration = $request->duration;
        $clinical_training->training_organization = $request->training_organization;

        if ($files = $request->file('training_file')) {
            $destinationPath = public_path('/clinical_training/');
            $file_name = $files->getClientOriginalName();
            $files->move($destinationPath, $file_name);
            $clinical_training->training_file = $file_name;
        }

        $clinical_training->update();

        return response()->json(['success' => 1, 'data' => new ClinicalTrainingResource($clinical_training)]);
    }

    public function get_clinical_traning()
    {
        $data = ClinicalTraining::get();
        return response()->json(['success' => 1, 'data' => ClinicalTrainingResource::collection($data)]);
    }

    public function delete_clinical_traning($id)
    {
        $clinical_training = ClinicalTraining::find($id);
        $clinical_training->delete();
        return response()->json(['success' => 1, 'data' => new ClinicalTrainingResource($clinical_training)]);
    }
}
