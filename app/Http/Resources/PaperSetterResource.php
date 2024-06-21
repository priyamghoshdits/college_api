<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaperSetterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'staff_id' => $this->staff_id,
            'examination_name' => $this->examination_name,
            'subject_name' => $this->subject_name,
            'university_name' => $this->university_name,
            'referance_no' => $this->referance_no,
            'ref_date' => $this->ref_date,
            'paper_file' => $this->paper_file,
        ];
    }
}
