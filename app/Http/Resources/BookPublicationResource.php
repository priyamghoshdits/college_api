<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookPublicationResource extends JsonResource
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
            'book_name' => $this->book_name,
            'ISBN_number' => $this->ISBN_number,
            'name_of_publisher' => $this->name_of_publisher,
            'chapter_full_book' => $this->chapter_full_book,
            'chapter_name' => $this->chapter_name,
            'page_number' => $this->page_number,
        ];
    }
}
