<?php

namespace App\Http\Resources;

use App\Models\CompanyDetail;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlacementResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'subject_details_id' => $this->id,
            'course_id' => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            'semester_id' => $this->semester_id,
            'semester_name' => Semester::find($this->semester_id)->name,
            'session_id' => $this->session_id,
            'session_name' => Session::find($this->session_id)->name,
            'company_id' => $this->company_id,
            'company_name' => CompanyDetail::find($this->company_id)->name,
            'user_id' => $this->user_id,
            'user_name' => User::find($this->user_id)->first_name.' '.User::find($this->user_id)->middle_name.' '.User::find($this->user_id)->last_name,
            'placement_date' => $this->placement_date,
            'description' => $this->description,
        ];
    }
}
