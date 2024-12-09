<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffExperienceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'staff_id' => $this->staff_id,
            'staff_name' => User::find($this->staff_id) ? User::find($this->staff_id)->first_name . ' ' . User::find($this->staff_id)->middle_name . ' ' . User::find($this->staff_id)->last_name : null,
            'designation' => $this->designation,
            'organization' => $this->organization,
            'experience' => $this->experience,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'file' => $this->file,
            'file_url' => $this->experience_proof != null ? asset("staff_experience_proof/{$this->experience_proof}") : null,
        ];
    }
}
