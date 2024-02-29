<?php

namespace App\Http\Controllers;

use App\Models\StaffAttendance;
use App\Http\Requests\StoreStaffAttendanceRequest;
use App\Http\Requests\UpdateStaffAttendanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffAttendanceController extends Controller
{
    public function get_staff_attendance($user_type_id, $date)
    {
        $attendance = DB::select("select users.id,users.user_type_id ,users.first_name,users.middle_name, users.last_name, ifnull(staff_attendances.attendance,'absent') as attendance from users
            left join staff_attendances on staff_attendances.user_id = users.id
            where users.user_type_id = ? and staff_attendances.date = ?",[$user_type_id,$date]);

        if(count($attendance) == 0){
            $attendance = DB::select("select users.id, users.user_type_id ,users.first_name,users.middle_name, users.last_name, ifnull(staff_attendances.attendance,'absent') as attendance from users
            left join staff_attendances on staff_attendances.user_id = users.id
            where users.user_type_id = ?",[$user_type_id]);
            return response()->json(['success'=>1,'data' => $attendance], 200,[],JSON_NUMERIC_CHECK);
        }

        return response()->json(['success'=>1,'data' => $attendance], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_attendance(Request $request)
    {
        $attendance_by = $request->user()->id;
        $requestedData = $request->json()->all();
        foreach ($requestedData as $data){
            $attendance = new StaffAttendance();
            $attendance->user_id = $data['id'];
            $attendance->user_type_id = $data['user_type_id'];
            $attendance->attendance = $data['attendance'];
            $attendance->attendance_by = $attendance_by;
            $attendance->date = $data['date'];
            $attendance->save();
        }
        return response()->json(['success'=>1,'data' => $requestedData], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffAttendance $staffAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffAttendance $staffAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffAttendanceRequest $request, StaffAttendance $staffAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffAttendance $staffAttendance)
    {
        //
    }
}
