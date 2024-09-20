<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvigilatorResource;
use App\Models\Invigilator;
use App\Http\Requests\StoreInvigilatorRequest;
use App\Http\Requests\UpdateInvigilatorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InvigilatorController extends Controller
{
    public function get_invigilator()
    {
        $invigilator = Invigilator::get();
        return response()->json(['success' => 1, 'data' =>InvigilatorResource::collection($invigilator)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_invigilator(Request $request)
    {
        $invigilator = new Invigilator();
        $invigilator->name_of_examination = $request['name_of_examination'];
        $invigilator->course_name = $request['course_name'];
        $invigilator->subject = $request['subject'];
        $invigilator->from_date = $request['from_date'];
        $invigilator->to_date = $request['to_date'];
        $invigilator->name_of_institute = $request['name_of_institute'];
        $invigilator->appointed_by = $request['appointed_by'];
        if ($files = $request->file('file')) {
            $destinationPath = public_path('/invigilator/');
            $extension = $files->getClientOriginalExtension();
            $profileImage1 = pathinfo($files->getClientOriginalName(), PATHINFO_FILENAME) . '_' .date('Ymd_His'). '.' . $extension;
            $files->move($destinationPath, $profileImage1);
            $invigilator->file_name = $profileImage1 ?? null;
        }
        $invigilator->save();

        return response()->json(['success' => 1, 'data' => new InvigilatorResource($invigilator) , 'message' => 'Invigilator saved successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_invigilator(Request $request)
    {
        $invigilator = Invigilator::find($request['id']);
        $invigilator->name_of_examination = $request['name_of_examination'];
        $invigilator->course_name = $request['course_name'];
        $invigilator->subject = $request['subject'];
        $invigilator->from_date = $request['from_date'];
        $invigilator->to_date = $request['to_date'];
        $invigilator->name_of_institute = $request['name_of_institute'];
        $invigilator->appointed_by = $request['appointed_by'];
        if ($files = $request->file('file')) {
            if (file_exists(public_path() . '/invigilator/' . $invigilator->file_name)) {
                File::delete(public_path() . '/invigilator/' . $invigilator->file_name);
            }
            $destinationPath = public_path('/invigilator/');
            $extension = $files->getClientOriginalExtension();
            $profileImage1 = pathinfo($files->getClientOriginalName(), PATHINFO_FILENAME) . '_' .date('Ymd_His'). '.' . $extension;
            $files->move($destinationPath, $profileImage1);
            $invigilator->file_name = $profileImage1 ?? null;
        }
        $invigilator->update();

        return response()->json(['success' => 1, 'data' =>new InvigilatorResource($invigilator) , 'message' => 'Invigilator updated successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_invigilator($id)
    {
        $invigilator = Invigilator::find($id);
        if (file_exists(public_path() . '/invigilator/' . $invigilator->file_name)) {
            File::delete(public_path() . '/invigilator/' . $invigilator->file_name);
        }
        $invigilator->delete();
        return response()->json(['success' => 1, 'data' =>new InvigilatorResource($invigilator) , 'message' => 'Invigilator Deleted successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invigilator $invigilator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvigilatorRequest $request, Invigilator $invigilator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invigilator $invigilator)
    {
        //
    }
}
