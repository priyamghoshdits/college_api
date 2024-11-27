<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\LibraryStock;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LibraryDigitalBookResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'course_id' => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            'semester_id' => $this->semester_id,
            'semester_name' => Semester::find($this->semester_id)->name,
            'book_id' => $this->book_id,
            'book_name' => LibraryStock::find($this->book_id)->name,
            'file_name' => $this->file_name,
            'file_url' =>  $this->file_name != null ? asset("library_books/{$this->file_name}") : null,
        ];
    }
}
