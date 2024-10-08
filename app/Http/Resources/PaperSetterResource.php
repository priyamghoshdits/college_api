<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaperSetterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'staff_id' => $this->staff_id,
            'staff_name' => User::find($this->staff_id)->first_name.' '.User::find($this->staff_id)->middle_name.' '.User::find($this->staff_id)->last_name,
            'examination_name' => $this->examination_name,
            'subject_name' => $this->subject_name,
            'course_name' => $this->course_name,
            'university_name' => $this->university_name,
            'referance_no' => $this->referance_no,
            'ref_date' => $this->ref_date,
            'paper_file' => $this->paper_file,
            'file_url' => $this->paper_file != null ? asset("paper_file/{$this->paper_file}") : null,
        ];
    }
}
