<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'staff_id' => $this->staff_id,
            'staff_name' => User::find($this->staff_id)->first_name . ' ' . User::find($this->staff_id)->middle_name . ' ' . User::find($this->staff_id)->last_name,
            'from' => $this->from,
            'to' => $this->to,
            'promotion_date' => $this->promotion_date,
            'file' => $this->file != null ? asset("promotion_file/{$this->file}") : null,
        ];
    }
}
