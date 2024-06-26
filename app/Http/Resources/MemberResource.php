<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Department;
use App\Models\Designation;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class MemberResource extends JsonResource
{
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
            'category_id' => $this->category_id,
            'category_name' => Category::find($this->category_id)->name,
            'religion' => $this->religion,
            'mobile_no' => $this->mobile_no,
            'img_url' => asset('public/user_image/'),
            'image' => $this->image,
            'emergency_phone_number' => $this->emergency_phone_number,
            'blood_group' => $this->blood_group,
            'user_type_id' => $this->user_type_id,
            'user_type' => UserType::find($this->user_type_id)->name,
            'email' => $this->email,
            'epf_number' => $this->epf_number,
            'basic_salary' => $this->basic_salary,
            'location' => $this->location,
            'contract_type' => $this->contract_type,
            'bank_account_number' => $this->bank_account_number,
            'bank_name' => $this->bank_name,
            'ifsc_code' => $this->ifsc_code,
            'current_address' => $this->current_address,
            'bank_branch_name' => $this->bank_branch_name,
            'permanent_address' => $this->permanent_address,
            'qualification' => $this->qualification,
            'work_experience' => $this->work_experience,
            'material_status' => $this->material_status,
            'date_of_joining' => $this->date_of_joining,
            'designation_id' => $this->designation_id,
            'department_id' => $this->department_id,
            'designation_name' => Designation::find($this->designation_id)->name ?? null,
            'department_name' => Department::find($this->department_id)->name ?? null,
            'pan_number' => $this->pan_number,
            'joining_letter_proof' => $this->joining_letter_proof,
            'caste_certificate_proof' => $this->caste_certificate_proof,
            'pan_proof' => $this->pan_proof,
            'blood_group_proof' => $this->blood_group_proof,
        ];
    }
}
