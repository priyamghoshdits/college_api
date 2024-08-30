<?php

namespace App\Http\Resources;

use App\Models\StudentDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResultResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $student_details = StudentDetail::where('student_id', $this->student_id)->first();
        return [
            'id' => $this->id,
            'course_id' => $student_details->course_id,
            'semester_id' => $student_details->semester_id,
            'student_id' => $this->student_id,
            'student_name' => User::find($this->student_id)->first_name . ' ' . User::find($this->student_id)->middle_name . ' ' . User::find($this->student_id)->last_name,
            'date_of_publication' => $this->date_of_publication,
            'exam_marks' => $this->exam_marks,
            'total_number_score' => $this->total_number_score,
            'percentage' => $this->percentage,
            'grade' => $this->grade,
            'division' => $this->division,
            'file_url' => $this->file_name != null ? asset("student_result/{$this->file_name}") : null,
        ];
    }
}
