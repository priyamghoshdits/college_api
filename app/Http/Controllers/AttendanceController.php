<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\User;
use Illuminate\Contracts\Mail\Attachable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function save_attendance(Request $request)
    {
        $requestedData = $request->json()->all();
        $course_id = $requestedData[0]['course_id'];
        $semester_id = $requestedData[0]['semester_id'];
        $subject_id = $requestedData[0]['subject_id'];
        $date = $requestedData[0]['date'];

        foreach ($requestedData as $list){
            $attendanceUpdate = Attendance::whereCourseId($course_id)->whereSemesterId($semester_id)->where('date',$date)->whereSubjectId($subject_id)->whereUserId($list['user_id'])->first();
            if($attendanceUpdate){
                $attendanceUpdate->attendance = $list['attendance'];
                $attendanceUpdate->update();
            }else{
                $attendance = new Attendance();
                $attendance->course_id = $course_id;
                $attendance->semester_id = $semester_id;
                $attendance->subject_id = $subject_id;
                $attendance->user_id = $list['user_id'];
                $attendance->user_type_id = 3;
                $attendance->attendance = $list['attendance'];
                $attendance->date = $date;
                $attendance->save();
            }
        }

        return response()->json(['success'=>1], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_student_attendance($course_id, $semester_id, $date, $subject_id)
    {

        $attendanceTable = DB::select("select users.id as user_id, users.first_name, users.middle_name, users.last_name, users.middle_name, users.last_name, ifnull(attendances.attendance,'absent') as attendance, attendances.date, attendances.subject_id from users
            left join attendances on attendances.user_id = users.id
            inner join student_details on users.id =  student_details.student_id
            where users.user_type_id = 3 and student_details.course_id = ? and student_details.semester_id = ? and attendances.date = ? and attendances.subject_id = ?",[$course_id, $semester_id, $date, $subject_id]);

//        return response()->json(['success'=>15,'data' =>count($attendanceTable)], 200,[],JSON_NUMERIC_CHECK);

        if(count($attendanceTable)>0){
            return response()->json(['success'=>15,'data' => $attendanceTable], 200,[],JSON_NUMERIC_CHECK);
        }else{
            $data = DB::select("select users.id as user_id, users.first_name, users.middle_name, users.last_name, users.middle_name, users.last_name, 'absent' as attendance from users
                inner join student_details on users.id =  student_details.student_id
                where users.user_type_id = 3 and student_details.course_id = ? and student_details.semester_id = ?",[$course_id,$semester_id]);

            return response()->json(['success'=>1,'data' => $data], 200,[],JSON_NUMERIC_CHECK);
        }

//        select users.id, users.first_name, users.middle_name, users.last_name,ifnull(table1.attendance,'Absent') as attendances from (SELECT * FROM attendances where date = "2024-01-11") as table1
//        right join users on users.id = table1.user_id
//        where users.user_type_id = 3;
    }

    public function get_student_attendance_own($course_id, $semester_id, $date)
    {
        $attendance = DB::select("select attendances.id, attendances.course_id, attendances.semester_id, attendances.subject_id, courses.course_name, semesters.name as semester_name, subjects.name as subject_name, attendances.attendance, attendances.date from attendances
            inner join courses on courses.id = attendances.course_id
            inner join semesters on semesters.id = attendances.semester_id
            inner join subjects on subjects.id = attendances.subject_id
            where attendances.course_id = ? and attendances.semester_id = ? and attendances.date = ?",[$course_id, $semester_id, $date]);
        return response()->json(['success'=>1,'data' => $attendance], 200,[],JSON_NUMERIC_CHECK);
    }

    public function store(StoreAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
