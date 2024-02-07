<?php

namespace App\Http\Resources;

use App\Models\FeesType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'student_name' => User::find($this->student_id)->first_name.' '.User::find($this->student_id)->middle_name.' '.User::find($this->student_id)->last_name,
            'course_id' => $this->course_id,
            'semester_id' => $this->semester_id,
            'scholarship_code' => $this->scholarship_code,
            'description' => $this->description,
            'amount' => $this->amount
        ];
    }
}
