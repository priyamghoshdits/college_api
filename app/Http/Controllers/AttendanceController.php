<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClassStatusResource;
use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\ClassStatus;
use App\Models\holiday;
use App\Models\SemesterTimetable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Mail\Attachable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{

    public function update_class_start(Request $request){
        $classStatus = ClassStatus::find($request[0]);
        $classStatus->started_by = $request->user()->id;
        $classStatus->time_on = Carbon::now()->format('h:i:s A');
        $classStatus->update();
        return response()->json(['success'=>1,'class_status' =>new ClassStatusResource($classStatus)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_class($subject_id){
        $today = Carbon::now()->format('Y-m-d');
        $getClass = Attendance::select('class')->whereSubjectId($subject_id)->where('date',$today)->get();
        return response()->json(['success'=>1,'data' =>$getClass], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_class_end(Request $request){
        $classStatus = ClassStatus::find($request[0]);
        $classStatus->ended_by = $request->user()->id;
        $classStatus->ended_on = Carbon::now()->format('h:i:s A');
        $classStatus->update();
        return response()->json(['success'=>1,'class_status' =>new ClassStatusResource($classStatus)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_attendance(Request $request)
    {
        $attendance_by = $request->user()->id;
        $requestedData = $request->json()->all();
        $today = Carbon::now()->format('Y-m-d');
        $class_no = Attendance::whereSubjectId($requestedData[0]['subject_id'])->where('date',$today)->orderBy('id','DESC')->first();
        if($class_no && $requestedData[0]['_class'] == 'new'){
            $class = (int)$class_no->class + 1;
//            return $class;
            $course_id = $requestedData[0]['course_id'];
            $semester_id = $requestedData[0]['semester_id'];
            $subject_id = $requestedData[0]['subject_id'];
            $date = $requestedData[0]['date'];
            $session_id = $requestedData[0]['session_id'];

            $attendanceUpdates = Attendance::whereCourseId($course_id)
                ->whereSemesterId($semester_id)
                ->where('date',$date)
                ->whereSubjectId($subject_id)
                ->whereClass($class)
                ->first();
            if(!$attendanceUpdates){
                $classStatus = new ClassStatus();
                $classStatus->started_by = null;
                $classStatus->time_on = null;
                $classStatus->ended_by = null;
                $classStatus->ended_on = null;
                $classStatus->save();

                $classStatus_id = $classStatus->id;
            }else{
                $classStatus_id = $attendanceUpdates->class_status_id;
            }

            foreach ($requestedData as $list){
//                $attendanceUpdate = Attendance::whereCourseId($course_id)
//                    ->whereSemesterId($semester_id)->where('date',$date)
//                    ->whereSubjectId($subject_id)
//                    ->whereUserId($list['user_id'])
//                    ->whereClass($class)
//                    ->first();
//                if($attendanceUpdate){
//                    $attendanceUpdate->attendance = $list['attendance'];
//                    $attendanceUpdate->update();
//                }else{
                    $attendance = new Attendance();
                    $attendance->course_id = $course_id;
                    $attendance->semester_id = $semester_id;
                    $attendance->subject_id = $subject_id;
                    $attendance->session_id = $session_id;
                    $attendance->attendance_by = $attendance_by;
                    $attendance->user_id = $list['user_id'];
                    $attendance->user_type_id = 3;
                    $attendance->attendance = $list['attendance'];
                    $attendance->date = $date;
                    $attendance->class = $class;
                    $attendance->class_status_id = $classStatus_id;
                    $attendance->save();
//                }
            }

        }else{
            $course_id = $requestedData[0]['course_id'];
            $semester_id = $requestedData[0]['semester_id'];
            $subject_id = $requestedData[0]['subject_id'];
            $date = $requestedData[0]['date'];
            $session_id = $requestedData[0]['session_id'];
            $class = $requestedData[0]['_class'];

            $attendanceUpdates = Attendance::whereCourseId($course_id)
                ->whereSemesterId($semester_id)
                ->where('date',$date)
                ->whereSubjectId($subject_id)
                ->whereClass($class)
                ->first();
            if(!$attendanceUpdates){
                $classStatus = new ClassStatus();
                $classStatus->started_by = null;
                $classStatus->time_on = null;
                $classStatus->ended_by = null;
                $classStatus->ended_on = null;
                $classStatus->save();

                $classStatus_id = $classStatus->id;
            }else{
                $classStatus_id = $attendanceUpdates->class_status_id;
            }

            foreach ($requestedData as $list){
                $attendanceUpdate = Attendance::whereCourseId($course_id)
                    ->whereSemesterId($semester_id)->where('date',$date)
                    ->whereSubjectId($subject_id)
                    ->whereUserId($list['user_id'])
                    ->whereClass($class)
                    ->first();
                if($attendanceUpdate){
                    $attendanceUpdate->attendance = $list['attendance'];
                    $attendanceUpdate->update();
                }else{
                    $attendance = new Attendance();
                    $attendance->course_id = $course_id;
                    $attendance->semester_id = $semester_id;
                    $attendance->subject_id = $subject_id;
                    $attendance->session_id = $session_id;
                    $attendance->attendance_by = $attendance_by;
                    $attendance->user_id = $list['user_id'];
                    $attendance->user_type_id = 3;
                    $attendance->attendance = $list['attendance'];
                    $attendance->date = $date;
                    $attendance->class = $class;
                    $attendance->class_status_id = $classStatus_id;
                    $attendance->save();
                }
            }
        }

        return response()->json(['success'=>1,'class_status' =>new ClassStatusResource(ClassStatus::find($classStatus_id))], 200,[],JSON_NUMERIC_CHECK);
    }

    public function attendance_percentage(Request $request){

        $requestedData = (object)$request->json()->all();

        $receivedStartDate = $requestedData->from_date;
        $receivedEndDate = $requestedData->to_date;
        $session_id = $requestedData->session_id;
        $courseId = $requestedData->course_id;
        $semesterId = $requestedData->semester_id;
        $no_of_days = 0;
        $retArr = [];
        $start_date = Carbon::parse($receivedStartDate);
        $end_date = Carbon::parse($receivedEndDate);
        for($i = $start_date; $i <= $end_date; $i->modify('+1 day')){
            $holiday = Holiday::whereDate('date',Carbon::createFromDate($i->format("Y-m-d")))->first();
            if($holiday){
                continue;
            }else{
                if (Carbon::createFromDate($i->format("Y-m-d"))->dayOfWeek === Carbon::SUNDAY) {
                    $no_of_days = $no_of_days + (DB::select('SELECT count(id) as week1 FROM `semester_timetables`  where week_id = ? and session_id=?',[0,$session_id]))[0]->week1;
                }else{
                    $no_of_days = $no_of_days + (DB::select('SELECT count(id) as week1 FROM `semester_timetables`  where week_id = ? and session_id=?',[Carbon::createFromDate($i->format("Y-m-d"))->dayOfWeek,$session_id]))[0]->week1;
                }
            }
        }

        $users = User::join('student_details', 'users.id', '=', 'student_details.student_id')
            ->whereCourseId($courseId)
            ->whereCurrentSemesterId($semesterId)
            ->whereSessionId($session_id)
            ->get();

        foreach ($users as $user){
            $ret = [
                'name' => $user['first_name'].' '.$user['middle_name'].' '.$user['last_name'],
                'present' => count(Attendance::whereUserId($user['id'])->whereAttendance('present')->whereBetween('date',[$receivedStartDate,$receivedEndDate])->get()),
                'absent' => $no_of_days - (count(Attendance::whereUserId($user['id'])->whereAttendance('present')->whereBetween('date',[$receivedStartDate,$receivedEndDate])->get())),
                'total_classes' => $no_of_days,
                'attendance_percentage' =>((count(Attendance::whereUserId($user['id'])->whereAttendance('present')->whereBetween('date',[$receivedStartDate,$receivedEndDate])->get()))!=0)? round(((count(Attendance::whereUserId($user['id'])->whereAttendance('present')->whereBetween('date',[$receivedStartDate,$receivedEndDate])->get()))/$no_of_days)*100,2):0,
            ];
            $retArr[] = $ret;
        }

        return response()->json(['success'=>1, 'data' =>$retArr], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_student_attendance($course_id, $semester_id, $date, $subject_id, $session_id, $class)
    {
        $day = Carbon::parse($date)->dayOfWeek;

        if($day == 0){
            $semesterTimeTable = SemesterTimetable::whereCourseId($course_id)->whereSemesterId($semester_id)
                ->whereSessionId($session_id)->whereSubjectId($subject_id)->whereWeekId(0)->first();
        }else{
            $semesterTimeTable = SemesterTimetable::whereCourseId($course_id)->whereSemesterId($semester_id)
                ->whereSessionId($session_id)->whereSubjectId($subject_id)->whereWeekId($day)->first();
        }

        $attendanceTable = DB::select("select users.id as user_id, users.first_name, users.middle_name, users.last_name, users.middle_name, users.last_name, ifnull(attendances.attendance,'absent') as attendance, attendances.date, attendances.subject_id, attendances.class_status_id  from users
            left join attendances on attendances.user_id = users.id
            inner join student_details on users.id =  student_details.student_id
            where users.user_type_id = 3 and student_details.course_id = ? and student_details.semester_id = ? and student_details.session_id = ?
              and attendances.date = ? and attendances.subject_id = ? and student_details.admission_status = 1 and class = ?",[$course_id, $semester_id, $session_id ,$date, $subject_id, $class]);

        if(count($attendanceTable)>0 || $class != 'new'){
            $class_status = ClassStatus::find($attendanceTable[0]->class_status_id);
            return response()->json(['success'=>0, 'class_status' => new ClassStatusResource($class_status) ,'data' => $attendanceTable, 'semester_time_table'=>$semesterTimeTable?1:0], 200,[],JSON_NUMERIC_CHECK);
        }else{
            $data = DB::select("select users.id as user_id, users.first_name, users.middle_name, users.last_name, users.middle_name, users.last_name, 'absent' as attendance from users
                inner join student_details on users.id =  student_details.student_id
                where users.user_type_id = 3 and student_details.course_id = ? and student_details.admission_status = 1
                  and student_details.semester_id = ? and student_details.session_id = ?",[$course_id,$semester_id, $session_id]);

            return response()->json(['success'=>1,'data' => $data, 'class_status' => null, 'semester_time_table'=>$semesterTimeTable?1:0], 200,[],JSON_NUMERIC_CHECK);
        }

//        select users.id, users.first_name, users.middle_name, users.last_name,ifnull(table1.attendance,'Absent') as attendances from (SELECT * FROM attendances where date = "2024-01-11") as table1
//        right join users on users.id = table1.user_id
//        where users.user_type_id = 3;
    }

    public function get_student_attendance_own($course_id, $semester_id, $date, $user_id)
    {
        $attendance = DB::select("select attendances.id,CONCAT(users.first_name, ' ', users.last_name) as attendance_by_name, attendances.course_id, attendances.semester_id, attendances.subject_id, courses.course_name, semesters.name as semester_name, subjects.name as subject_name, attendances.attendance, attendances.date from attendances
            inner join courses on courses.id = attendances.course_id
            inner join semesters on semesters.id = attendances.semester_id
            inner join subjects on subjects.id = attendances.subject_id
            inner join users on attendances.attendance_by = users.id
            where attendances.course_id = ? and attendances.semester_id = ? and attendances.date = ? and attendances.user_id = ?",[$course_id, $semester_id, $date, $user_id]);
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
