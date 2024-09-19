<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvigilatorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name_of_examination' => $this->name_of_examination,
            'course_name' => $this->course_name,
            'subject' => $this->subject,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'name_of_institute' => $this->name_of_institute,
            'appointed_by' => $this->appointed_by,
            'file_url' => $this->file_name == null ? null : asset("invigilator/{$this->file_name}"),
        ];
    }
}
