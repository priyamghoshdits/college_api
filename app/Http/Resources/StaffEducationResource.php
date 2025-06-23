<?php

namespace App\Http\Resources;

use App\Models\Degree;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffEducationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'staff_id' => $this->staff_id,
            'staff_name' => User::find($this->staff_id)->first_name . ' ' . User::find($this->staff_id)->middle_name . ' ' . User::find($this->staff_id)->last_name,
            'degree' => $this->degree,
            'degree_name' => Degree::find($this->degree)?->name,
            'specialization' => $this->specialization,
            'university_name' => $this->university_name,
            'percentage' => $this->percentage,
            'grade' => $this->grade,
            'file_name' => $this->file_name,
            'file_url' => $this->file_name != null ? asset("staff_education/{$this->file_name}") : null,
        ];
    }
}
