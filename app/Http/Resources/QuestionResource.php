<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Question;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\SubjectDetails;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class QuestionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'subject_details_id' => $this->id,
            'course_id' => $this->course_id,
            'semester_id' => $this->semester_id,
            'subject_id' => $this->subject_id,
//            'questions' => Question::whereSubjectDetailsId($this->id)->get(),
            'questions' => $this->questions,
            'ans_submitted' => $this->ans_count,
            'course_name' => Course::find($this->course_id)->course_name,
            'semester_name' => Semester::find($this->semester_id)->name,
            'subject_name' => Subject::find($this->subject_id) ? Subject::find($this->subject_id)->name : null,
            'exam_date' => $this->exam_date,
            'publish_date' => $this->publish_date,
            'time_from' => $this->time_from,
            'time_to' => $this->time_to,
            'full_marks' => $this->full_marks,
        ];
    }
}
