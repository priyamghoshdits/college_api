<?php

namespace App\Http\Resources;

use App\Models\InventoryItem;
use App\Models\ItemStore;
use App\Models\ItemSupplier;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemStockResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'inventory_item_id' => $this->inventory_item_id,
            'inventory_item_name' => InventoryItem::find($this->inventory_item_id)->name,
            'item_supplier_id' => $this->item_supplier_id,
            'item_supplier_name' => ItemSupplier::find($this->item_supplier_id)->name,
            'item_store_id' => $this->item_store_id,
            'item_store_name' => ItemStore::find($this->item_store_id)->name,
            'quantity' => $this->quantity,
            'purchase_price' => $this->purchase_price,
            'purchase_date' => $this->purchase_date,
            'description' => $this->description,
        ];
    }
}
