<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class AssignSemesterTeacherResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'course_id' => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            'semester_id' => $this->semester_id,
            'semester_name' => Semester::find($this->semester_id)->name,
            'teacher' => DB::select("SELECT users.id,users.first_name,users.middle_name,users.last_name FROM `assign_semester_teachers`
                inner join users on users.id = assign_semester_teachers.teacher_id
                where assign_semester_teachers.course_id = ? and assign_semester_teachers.semester_id = ?;",[$this->course_id,$this->semester_id])
        ];
    }
}
