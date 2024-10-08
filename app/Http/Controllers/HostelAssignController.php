<?php

namespace App\Http\Controllers;

use App\Models\HostelAssign;
use App\Http\Resources\HostelAssignResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HostelAssignController extends Controller
{

    public function get_hostel_assign(Request $request)
    {
        $data = HostelAssign::get();
        return response()->json(['success' => 1, 'data' => HostelAssignResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_hostel_assign(Request $request)
    {
        // $requestData = (object)$request->json()->all();
        $hostel = new HostelAssign();
        $hostel->session_id = $request->session_id;
        $hostel->course_id = $request->course_id;
        $hostel->semester_id = $request->semester_id;
        $hostel->student_id = $request->student_id;
        $hostel->hostel_room_id = $request->hostel_room_id;
        $hostel->from_date = $request->from_date;
        $hostel->to_date = $request->to_date;
        $hostel->remarks = $request->remarks;
        $hostel->save();
        return response()->json(['success' => 1, 'data' => new HostelAssignResource($hostel)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_hostel_assign(Request $request)
    {
        // $requestData = (object)$request->json()->all();
        $hostel = HostelAssign::find($request->id);
        $hostel->session_id = $request->session_id;
        $hostel->course_id = $request->course_id;
        $hostel->semester_id = $request->semester_id;
        $hostel->student_id = $request->student_id;
        $hostel->hostel_room_id = $request->hostel_room_id;
        $hostel->from_date = $request->from_date;
        $hostel->to_date = $request->to_date;
        $hostel->remarks = $request->remarks;
        $hostel->save();
        return response()->json(['success' => 1, 'data' => new HostelAssignResource($hostel)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_hostel_assign($id)
    {
        $hostel = HostelAssign::find($id);
        $hostel->delete();
        return response()->json(['success' => 1, 'data' => new HostelAssignResource($hostel)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function get_hostel_assign_report(Request $request)
    {
        $data = (object)$request->json()->all();
        // $hostel_assign_data = DB::select("select * from hostel_assigns WHERE date(from_date) > ? and date(to_date) < ?;",[$data->from_date, $data->to_date]);
        $hostel_assign_data = HostelAssign::whereBetween('from_date', [$data->from_date, $data->to_date])->get();

        return response()->json(['success' => 1, 'data' => HostelAssignResource::collection($hostel_assign_data)], 200, [], JSON_NUMERIC_CHECK);
    }
}
