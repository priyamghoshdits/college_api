<?php

namespace App\Http\Resources;

use App\Models\InternshipProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InternshipDetailsResource extends JsonResource
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
            'internship_provider_id' => $this->internship_provider_id,
            'internship_provider_name' => InternshipProvider::find($this->internship_provider_id)->name,
            'user_id' => $this->user_id,
            'user_name' => User::find($this->user_id)->first_name .' '. User::find($this->user_id)->middle_name.' '.User::find($this->user_id)->last_name,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date
        ];
    }
}
