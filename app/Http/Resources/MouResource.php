<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MouResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name_of_organisation' => $this->name_of_organisation,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'course_id' => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            'file_url' => $this->file_name != null ? asset("MOU/{$this->file_name}") : null,
        ];
    }
}
