<?php

namespace App\Http\Resources;

use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
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
            'first_name' => $this->first_name,
            'middle_name' => $this->first_name,
            'last_name' => $this->last_name,
            'user_type_id' => $this->user_type_id,
            'user_type_name' => UserType::find($this->user_type_id)->name,
            'image' => $this->image,
            'email' => $this->email,
            'token' => $this->token
        ];
    }
}
