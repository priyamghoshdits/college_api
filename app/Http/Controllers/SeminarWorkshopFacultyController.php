<?php

namespace App\Http\Controllers;

use App\Http\Resources\SeminarWorkshopFacultyResource;
use App\Models\SeminarWorkshopFaculty;
use App\Http\Requests\StoreSeminarWorkshopFacultyRequest;
use App\Http\Requests\UpdateSeminarWorkshopFacultyRequest;
use Illuminate\Http\Request;

class SeminarWorkshopFacultyController extends Controller
{
    public function save_seminar_workshop_faculty(Request $request)
    {
        foreach ($request['post_array'] as $list) {
            $data = new SeminarWorkshopFaculty();
            $data->staff_id = $list['staff_id'];
            $data->title_of_seminar = $list['title_of_seminar'];
            $data->type_of_seminar = $list['type_of_seminar'];
            $data->organized_by = $list['organized_by'];
            $data->duration = $list['duration'];
            $data->date = $list['date'];
            $data->achievement = $list['achievement'];
            $data->save();
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }


    public function update_seminar_workshop_faculty(Request $request)
    {
        foreach ($request['post_array'] as $list) {
            $data = SeminarWorkshopFaculty::find($list['id']);
            if($data){
                $data->staff_id = $list['staff_id'];
                $data->title_of_seminar = $list['title_of_seminar'];
                $data->type_of_seminar = $list['type_of_seminar'];
                $data->organized_by = $list['organized_by'];
                $data->duration = $list['duration'];
                $data->date = $list['date'];
                $data->achievement = $list['achievement'];
                $data->update();
            }else{
                $data = new SeminarWorkshopFaculty();
                $data->staff_id = $list['staff_id'];
                $data->title_of_seminar = $list['title_of_seminar'];
                $data->type_of_seminar = $list['type_of_seminar'];
                $data->organized_by = $list['organized_by'];
                $data->duration = $list['duration'];
                $data->date = $list['date'];
                $data->achievement = $list['achievement'];
                $data->save();
            }
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_seminar_workshop_faculty($id)
    {
        $data = SeminarWorkshopFaculty::find($id);
        $data->delete();

        $data = SeminarWorkshopFaculty::get();

        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function search_seminar_workshop_faculty(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        if($requestedData->staff_id == null || $requestedData->staff_id == "null"){
            $data = SeminarWorkshopFaculty::whereBetween('date', [$requestedData->from_date, $requestedData->to_date])->get();
        }else{
            $data = SeminarWorkshopFaculty::whereBetween('date', [$requestedData->from_date, $requestedData->to_date])
                ->whereStaffId($requestedData->staff_id)
                ->get();
        }
        return response()->json(['success' => 1, 'data' => SeminarWorkshopFacultyResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeminarWorkshopFaculty $seminarWorkshopFaculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeminarWorkshopFacultyRequest $request, SeminarWorkshopFaculty $seminarWorkshopFaculty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeminarWorkshopFaculty $seminarWorkshopFaculty)
    {
        //
    }
}
