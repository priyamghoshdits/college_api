<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeworkResource extends JsonResource
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
            'homework_date' => $this->homework_date,
            'submission_date' => $this->submission_date,
            'file_name' => $this->file_name,
        ];
    }
}
