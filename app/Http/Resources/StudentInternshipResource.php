<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Semester;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentInternshipResource extends JsonResource
{
      public function toArray(Request $request): array
    {
        $student_details = User::find($this->student_id);
        $session = Session::find($this->session_id);
        return [
            'id' => $this->id,
            'course_id' => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            'semester_id' => $this->semester_id,
            'semester_name' => Semester::find($this->semester_id)->name,
            'session_id' => $this->session_id,
            'session_name' => $session ? $session->name : '',
            // 'session_name' => Session::find($this->session_id)->name,
            'student_id' => $this->student_id,
            'student_name' => $student_details->first_name .' '. $student_details->middle_name .' '.$student_details->last_name,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'institutional_name' => $this->institutional_name,
            'file_url' => $this->file_name ? asset("/student_internship/{$this->file_name}"): null
        ];
    }
}
