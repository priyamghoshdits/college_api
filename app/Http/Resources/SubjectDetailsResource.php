<?php

namespace App\Http\Resources;

use App\Http\Controllers\SessionController;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Session;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectDetailsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'subject_id' => $this->subject_id,
            'subject_name' => Subject::find($this->subject_id) ? Subject::find($this->subject_id)->name : null ,
            'course_id' => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            'semester_name' => Semester::find($this->semester_id)->name,
            'semester_id' => $this->semester_id,
            'session_id' => $this->session_id,
            'session_name' => Session::find($this->session_id)->name,
            'exam_date' => $this->exam_date ,
            'publish_date' => $this->publish_date ,
            'time_from' => $this->time_from ,
            'time_to' => $this->time_to ,
            'full_marks' => $this->full_marks
        ];
    }
}
