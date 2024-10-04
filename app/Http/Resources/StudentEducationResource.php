<?php

namespace App\Http\Resources;

use App\Models\StudentDegree;
use App\Models\StudentDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentEducationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $student_details = User::find($this->student_id);
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'course_id' => (StudentDetail::whereStudentId($student_details->id)->first())->course_id,
            'semester_id' => (StudentDetail::whereStudentId($student_details->id)->first())->semester_id,
            'student_name' => $student_details->first_name.' '.$student_details->middle_name.' '.$student_details->last_name,
            'degree_id' => $this->degree_id,
            'degree_name' => StudentDegree::find($this->degree_id)->name,
            'university_name' => $this->university_name,
            'total_marks' => $this->total_marks,
            'total_marks_obtained' => $this->total_marks_obtained,
            'specialization' => $this->specialization,
            'year_of_passing' => $this->year_of_passing,
            'division' => $this->division,
            'grade' => $this->grade,
            'percentage' => $this->percentage,
            'year_sem' => $this->year_sem,
            'file_url' => $this->file_name != null ? asset("student_education/{$this->file_name}") : null
        ];
    }
}
