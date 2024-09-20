<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UniversityAdjudicatorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'course_name' => $this->course_name,
            'student_name' => $this->student_name,
            'thesis_type_id' => $this->thesis_type_id,
            'institute_name' => $this->institute_name,
            'title' => $this->title,
            'date_of_evaluation' => $this->date_of_evaluation,
            'reference_no' => $this->reference_no,
            'name_of_university' => $this->name_of_university,
            'date' => $this->date,
            'guide' => $this->guide,
            'co_guide' => $this->co_guide,
        ];
    }
}
