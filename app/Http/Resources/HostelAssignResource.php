<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HostelAssignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "course_id" => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            "semester_id" => $this->semester_id,
            'semester_name' => Semester::find($this->semester_id)->name,
            "session_id" => $this->session_id,
            "student_id" => $this->student_id,
            'student_name' => User::find($this->student_id)->first_name . ' ' . User::find($this->student_id)->middle_name . ' ' . User::find($this->student_id)->last_name,
            "hostel_room_id" => $this->hostel_room_id,
            "from_date" => $this->from_date,
            "to_date" => $this->to_date,
            "remarks" => $this->remarks,
        ];
    }
}
