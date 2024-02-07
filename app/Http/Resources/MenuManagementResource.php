<?php

namespace App\Http\Resources;

use App\Models\MenuManagement;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuManagementResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'permission' => MenuManagement::whereUserTypeId($this->id)->whereFranchiseId($this->franchise_id)->get()
        ];
    }
}
