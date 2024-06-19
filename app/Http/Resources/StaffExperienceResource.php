<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffExperienceResource extends JsonResource
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
            'designation' => $this->designation,
            'organization' => $this->organization,
            'experience' => $this->experience,
            'from_date' => $this->from_date,
            'end_date' => $this->end_date,
            'file' => $this->file,
        ];
    }
}
