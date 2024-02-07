<?php

namespace App\Http\Resources;

use App\Models\LibraryStock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class LibraryIssueResource extends JsonResource
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
            'book_id' => $this->book_id,
            'book_name' => LibraryStock::find($this->book_id)->name,
            'user_id' => $this->user_id,
            'issued_on' => $this->issued_on,
            'returned_on' => $this->returned_on ?? "-",
            'user_name' => User::find($this->user_id)->first_name.' '.User::find($this->user_id)->middle_name.' '.User::find($this->user_id)->last_name,
            'quantity' => $this->quantity,
            'returned' => $this->returned,
        ];
    }
}
