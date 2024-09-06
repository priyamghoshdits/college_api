<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicalTrainingResource extends JsonResource
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
            'internship_provider_id' => $this->internship_provider_id,
            'student_id' => $this->student_id,
            'student_full_name' => User::find($this->student_id)->first_name . ' ' . User::find($this->student_id)->middle_name . ' ' . User::find($this->student_id)->last_name,
            'course_name' => $this->course_name,
            'year_semester' => $this->year_semester,
            'duration' => $this->duration,
            'training_organization' => $this->training_organization,
            'training_file' => $this->training_file,
            'file_url' => $this->training_file != null ? asset("clinical_training/{$this->training_file}") : null,
        ];
    }
}
