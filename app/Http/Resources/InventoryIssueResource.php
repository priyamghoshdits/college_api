<?php

namespace App\Http\Resources;

use App\Models\InventoryItem;
use App\Models\ItemTypes;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryIssueResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_type_id' => $this->user_type_id,
            'user_type_name' => UserType::find($this->user_type_id)->name,
            'issue_to' => $this->issue_to,
            'issue_to_name' => User::find($this->issue_to)->first_name.' '.User::find($this->issue_to)->middle_name.' '.User::find($this->issue_to)->last_name,
            'issue_by' => $this->issue_by,
            'issue_by_name' => User::find($this->issue_by)->first_name.' '.User::find($this->issue_by)->middle_name.' '.User::find($this->issue_by)->last_name,
            'item_type_id' => $this->item_type_id,
            'item_type_name' => ItemTypes::find($this->item_type_id)->name,
            'inventory_item_id' => $this->inventory_item_id,
            'inventory_item_name' => InventoryItem::find($this->inventory_item_id)->name,
            'quantity' => $this->quantity,
            'issue_date' => $this->issue_date,
            'return_date' => $this->return_date,
            'status' => $this->status,
        ];
    }
}
