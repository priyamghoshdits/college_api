<?php

namespace App\Http\Resources;

use App\Models\LeaveType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeaveResource extends JsonResource
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
            'user_id' => $this->user_id,
            'user_name' => User::find($this->user_id)->first_name.' '.User::find($this->user_id)->middle_name.' '.User::find($this->user_id)->last_name,
            'leave_type_id' => $this->leave_type_id ,
            'leave_type_name' => LeaveType::find($this->leave_type_id)->name ,
            'from_date' => $this->from_date ,
            'to_date' => $this->to_date ,
            'total_days' => $this->total_days ,
            'reason' => $this->reason ,
            'approved' => $this->approved,
            'approved_by' => $this->approved_by,
        ];
    }
}
