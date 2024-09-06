<?php

namespace App\Http\Resources;

use App\Models\LibraryStock;
use App\Models\StudentDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class LibraryIssueResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $student_details = StudentDetail::whereStudentId($this->user_id)->first();
        return [
            'id' => $this->id,
            'book_id' => $this->book_id,
            'book_name' => LibraryStock::find($this->book_id)->name,
            'publisher_name' => LibraryStock::find($this->book_id)->publisher_name,
            'author_name' => LibraryStock::find($this->book_id)->author_name,
            'user_id' => $this->user_id,
            'course_id' => $student_details->course_id,
            'semester_id' => $student_details->current_semester_id,
            'issued_on' => $this->issued_on,
            'return_date' => $this->return_date,
            'fine' => $this->fine,
            'discount' => $this->discount,
            'amount' =>$this->fine - $this->discount,
            'returned_on' => $this->returned_on ?? "-",
            'user_name' => User::find($this->user_id)->first_name.' '.User::find($this->user_id)->middle_name.' '.User::find($this->user_id)->last_name,
            'quantity' => $this->quantity,
            'returned' => $this->returned,
        ];
    }
}
