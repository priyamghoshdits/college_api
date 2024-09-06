<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\ScholarshipMaster;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ManualScholarshipResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'course_id' => $this->course_id,
            'semester_id' => $this->semester_id,
            'student_id' => $this->student_id,
            'scholarship_master_id' => $this->scholarship_master_id,
            'scholarship_master_name' => ScholarshipMaster::find($this->scholarship_master_id)->name,
            'type_of_scholarship' => $this->type_of_scholarship,
            'amount' => $this->amount,
            'course_name' => Course::find($this->course_id)->course_name,
            'semester_name' => Semester::find($this->semester_id)->name,
            'student_name' => User::find($this->student_id)->first_name . ' ' . User::find($this->student_id)->middle_name . ' ' . User::find($this->student_id)->last_name,
        ];
    }
}
