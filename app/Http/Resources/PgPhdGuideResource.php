<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PgPhdGuideResource extends JsonResource
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
            'staff_id' => $this->staff_id,
            'staff_name' => User::find($this->staff_id)->first_name . ' ' . User::find($this->staff_id)->middle_name . ' ' . User::find($this->staff_id)->last_name,
            'student_id' => $this->student_id,
            'student_name' => User::find($this->student_id)->first_name . ' ' . User::find($this->student_id)->middle_name . ' ' . User::find($this->student_id)->last_name,
            'course' => $this->course,
            'title_name' => $this->title_name,
            'guide' => $this->guide,
            'co_guide' => $this->co_guide,
            'referance_no' => $this->referance_no,
            'ref_date' => $this->ref_date,
            'file_name' => $this->file_name,
            'status' => $this->status,
        ];
    }
}
