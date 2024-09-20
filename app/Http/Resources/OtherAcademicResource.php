<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OtherAcademicResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'designation' => $this->designation,
            'appointed_by' => $this->appointed_by,
            'date_of_appointment' => $this->date_of_appointment,
            'file_url' => $this->file_name == null ? null : asset("other_academics/{$this->file_name}"),
        ];
    }
}
