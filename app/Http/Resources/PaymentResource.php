<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'user_name' => User::find($this->student_id)->first_name.' '.User::find($this->student_id)->middle_name.' '.User::find($this->student_id)->last_name,
            'semester_id' => $this->semester_id,
            'semester_name' => Semester::find($this->semester_id)->name,
            'course_id' => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            'amount' => $this->amount,
            'paid_on' => $this->paid_on,
            'transaction_id' => $this->transaction_id,
            'mode' => $this->mode,
            'file_name' => $this->file_name,
            'description' => $this->description,
        ];
    }
}
