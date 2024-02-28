<?php

namespace App\Http\Resources;

use App\Models\StudentDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'mobile_no' => $this->mobile_no,
            'email' => $this->email,
            'commission_flat' => $this->commission_flat ?? 0,
            'commission_percentage' => $this->commission_percentage ?? 0,
        ];
    }
}
