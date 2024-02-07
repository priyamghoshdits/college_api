<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class RolesAndPermissionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'permission' => DB::select("select name, permission from roles_and_permissions where user_type_id = ? and role_id = ?", [$this->user_type_id,$this->id]),
        ];
    }
}
