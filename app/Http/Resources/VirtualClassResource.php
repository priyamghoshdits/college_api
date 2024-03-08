<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VirtualClassResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'course_id' => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            'semester_id' => $this->semester_id,
            'semester_name' => Semester::find($this->semester_id)->name,
            'subject_id' => $this->subject_id,
            'subject_name' => Subject::find($this->subject_id)->name,
            'teacher_id' => $this->teacher_id,
            'teacher_name' => User::find($this->teacher_id)->first_name .' '.User::find($this->teacher_id)->middle_name.' '.User::find($this->teacher_id)->last_name ,
            'topic' => $this->topic,
            'platform' => $this->platform,
            'link' => $this->link,
            'date_of_class' => $this->date_of_class,
            'time_of_class' => $this->time_of_class,
            'class_start_before' => $this->class_start_before,
            'class_duration' => $this->class_duration,
        ];
    }
}
