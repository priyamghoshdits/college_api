<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultancyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'staff_id' => $this->staff_id,
            'staff_name' => User::find($this->staff_id)->first_name.' '.User::find($this->staff_id)->middle_name.' '.User::find($this->staff_id)->last_name,
            'project_consultancy' => $this->project_consultancy,
            'sponsored_by' => $this->sponsored_by,
            'consultant' => $this->consultant,
            'amount' => $this->amount,
            'duration' => $this->duration,
            'status' => $this->status,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
        ];
    }
}
