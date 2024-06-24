<?php

namespace App\Http\Resources;

use App\Models\StudentDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UniversitySynopsisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $student_details = StudentDetail::where('student_id', $this->student_id)->first();
        return [
            'id' => $this->id,
            'staff_id' => $this->staff_id,
            'staff_name' => User::find($this->staff_id)->first_name . ' ' . User::find($this->staff_id)->middle_name . ' ' . User::find($this->staff_id)->last_name,
            'course_id' => $student_details->course_id,
            'semester_id' => $student_details->semester_id,
            'student_id' => $this->student_id,
            'student_name' => User::find($this->student_id)->first_name . ' ' . User::find($this->student_id)->middle_name . ' ' . User::find($this->student_id)->last_name,
            'institute_name' => $this->institute_name,
            'title' => $this->title,
            'course' => $this->course,
            'referance_no' => $this->referance_no,
            'ref_date' => $this->ref_date,
            'file_name' => $this->file_name,
            'date_evaluation' => $this->date_evaluation,
        ];
    }
}
