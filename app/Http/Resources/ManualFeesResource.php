<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ManualFeesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            //  'student_id' => $this->student_id,
            'student_id' =>  User::find($this->student_id)->first_name .' '.User::find($this->student_id)->middle_name.' '.User::find($this->student_id)->last_name,
            'student_name' => User::find($this->student_id)->first_name .' '.User::find($this->student_id)->middle_name.' '.User::find($this->student_id)->last_name,
//            'student_name' => User::find($this->id),
            'semester_id' => $this->semester_id,
            'semester_name' => Semester::find($this->semester_id)->name,
            'course_id' => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            'date_of_payment' => $this->date_of_payment,
            'money_received_number' => $this->money_received_number,
            'amount' => $this->amount,
            // 'file_name' => $this->file_name
            'file_name' => $this->file_name != null ? asset("manual_fees/{$this->file_name}") : null,
            'term_sem_id' => $this->term_sem_id,

        ];
    }
}
