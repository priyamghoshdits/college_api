<?php

namespace App\Http\Resources;

use App\Models\ItemTypes;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryItemResource extends JsonResource
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
            'item_type_id' => $this->item_type_id,
            'item_type_name' => ItemTypes::find($this->item_type_id)->name,
            'unit' => $this->unit,
            'description' => $this->description
        ];
    }
}
