<?php

namespace App\Http\Resources;

use App\Models\CourseGroup;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'course_name' => $this->course_name,
            'duration' => $this->duration,
            'semester' => DB::select("SELECT semesters.id, semesters.name FROM `courses`
                        inner join course_groups on course_groups.course_id = courses.id
                        inner join semesters on course_groups.semester_id = semesters.id
                        where courses.id = ".$this->id)
        ];
    }
}
