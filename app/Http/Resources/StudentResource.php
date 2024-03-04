<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Session;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'identification_no' => $this->identification_no,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'religion' => $this->religion,
            'mobile_no' => $this->mobile_no,
            'image' => $this->image,
            'category_id' => $this->category_id,
            'category_name' => Category::find($this->category_id)->name,
            'blood_group' => $this->blood_group,
            'user_type_id' => $this->user_type_id,
            'user_type' => UserType::find($this->user_type_id)->name,
            'email' => $this->email,
            'session_name'=> Session::find($this->session_id)->name ?? null,
            'course_id' => $this->course_id,
            'course_name' => (Course::find($this->course_id))->course_name ?? null,
            'semester_id' => $this->semester_id,
            'semester' => Semester::find($this->semester_id)->name ?? null,
            'current_semester_id' => $this->current_semester_id,
            'current_semester' => Semester::find($this->current_semester_id)->name ?? null,
            'session_id' => $this->session_id,
            'session' => Session::find($this->session_id)->name ?? null,
            'admission_date' => $this->admission_date,
            'father_name' => $this->father_name,
            'father_occupation' => $this->father_occupation,
            'father_phone' => $this->father_phone,
            'mother_name' => $this->mother_name,
            'mother_occupation' => $this->mother_occupation,
            'guardian_name' => $this->guardian_name,
            'guardian_email' => $this->guardian_email,
            'admission_status' => $this->admission_status,
            'material_status' => $this->material_status,
            'emergency_phone_number' => $this->emergency_phone_number,
            'current_address' => $this->current_address,
            'permanent_address' => $this->permanent_address,
            'mother_phone' => $this->mother_phone,
            'guardian_relation' => $this->guardian_relation,
            'guardian_occupation' => $this->guardian_occupation,
            'guardian_phone' => $this->guardian_phone,
            'guardian_address' => $this->guardian_address,
            'agent_id' => $this->agent_id,
            'status' => $this->status,
            'franchise_id' => $this->franchise_id,
        ];
    }
}
