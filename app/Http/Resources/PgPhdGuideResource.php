<?php

namespace App\Http\Resources;

use App\Models\StudentDetail;
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
            'course' => $this->course,
            'student_name' => $this->student_name,
            'course' => $this->course,
            'title_name' => $this->title_name,
            'guide' => $this->guide,
            'co_guide' => $this->co_guide,
            'referance_no' => $this->referance_no,
            'ref_date' => $this->ref_date,
            'file_name' => $this->file_name,
            'file_url' => $this->file_name != null ? asset("pg_phd_guide_file/{$this->file_name}") : null,
            'status' => $this->status,
            'status_name' => $this->status == 1 ? 'Complete' : 'Ongoing',
        ];
    }
}
