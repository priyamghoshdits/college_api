<?php

namespace App\Http\Resources;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class SubjectGroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
//            'id' => $this->id,
            'name' => $this->name,
            'course_id' => Course::find($this->course_id)->id,
            'course_name' => Course::find($this->course_id)->course_name,

            'semester' => DB::select("SELECT DISTINCT semester_id, semesters.name from subject_groups
                    inner join semesters on semesters.id = subject_groups.semester_id
                    where subject_groups.course_id = ".$this->course_id),
            'subject' => DB::select("SELECT DISTINCT subjects.name, subject_groups.subject_id from subject_groups
                inner join subjects on subjects.id = subject_groups.subject_id
                where subject_groups.course_id =".$this->course_id)
        ];
    }
}
