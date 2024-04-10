<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Registration;
use App\Models\Semester;
use App\Models\Session;
use App\Models\StudentDetail;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class MarksheetResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'course_id' => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            'semester_id' => $this->semester_id,
            'semester_name' => Semester::find($this->semester_id)->name,
            'session_id' => $this->session_id,
            'session_name' => Session::find($this->session_id)->name,
            'division' => $this->division,
            'date_of_issue' => $this->date_of_issue,
            'result_status' => $this->result_status,
            'roll_no' => (Registration::whereStudentId($this->student_id)->first())?(Registration::whereStudentId($this->student_id)->first())->roll_no : null,
            'registration_no' => (Registration::whereStudentId($this->student_id)->first())?(Registration::whereStudentId($this->student_id)->first())->registration_no : null,
            'mother_name' => optional(StudentDetail::whereStudentId($this->student_id)->first())->mother_name ,
            'father_name' => optional(StudentDetail::whereStudentId($this->student_id)->first())->father_name ,
//            'mother_name' => StudentDetail::whereStudentId($this->student_id)->find()->mother_name ,
//            'father_name' => StudentDetail::whereStudentId($this->student_id)->find()->father_name ,
            'student_id' => $this->student_id,
            'student_name' => User::find($this->student_id)->first_name.' '.User::find($this->student_id)->middle_name.' '.User::find($this->student_id)->last_name,
            'subject_details' => DB::select('SELECT marksheets.subject_id,subjects.subject_code , subjects.name, marksheets.marks,marksheets.min_marks,marksheets.full_marks FROM marksheets
                inner join subjects on marksheets.subject_id = subjects.id
                where marksheets.course_id = ?
                  and marksheets.semester_id= ?
                  and marksheets.session_id = ?
                  and marksheets.student_id = ?',[$this->course_id,$this->semester_id,$this->session_id,$this->student_id])
        ];
    }
}
