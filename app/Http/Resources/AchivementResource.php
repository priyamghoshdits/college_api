<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Semester;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AchivementResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'course_id' => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            'semester_id' => $this->semester_id,
            'semester_name' =>Semester::find($this->semester_id)->name,
            'session_id' => $this->session_id,
            'session_name' =>Session::find($this->session_id)->name,
            'student_id' => $this->student_id,
            'student_name' => User::find($this->student_id)->first_name .' '. User::find($this->student_id)->middle_name.' '. User::find($this->student_id)->last_name,
            'award_name' => $this->award_name,
            'award_date' => $this->award_date,
            'file_name' => $this->file_name,
        ];
    }
}
