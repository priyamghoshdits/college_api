<?php

namespace App\Http\Resources;

use App\Models\HotelType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class HostelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'hostel_type_id' => $this->hostel_type_id,
            'hostel_type_name' => HotelType::find($this->hostel_type_id)->name,
            'address' => $this->address,
            'description' => $this->description,
        ];
    }
}
