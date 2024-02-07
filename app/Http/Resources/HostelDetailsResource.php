<?php

namespace App\Http\Resources;

use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HostelDetailsResource extends JsonResource
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
            'name' => $this->name,
            'hostel_id' => $this->hostel_id,
            'hostel_name' => Hotel::find($this->hostel_id)->name,
            'room_type_id' => $this->room_type_id,
            'room_type_name' => RoomType::find($this->room_type_id)->name,
            'no_of_bed' => $this->no_of_bed,
            'cost_per_bed' => $this->cost_per_bed,
            'description' => $this->description,
        ];
    }
}
