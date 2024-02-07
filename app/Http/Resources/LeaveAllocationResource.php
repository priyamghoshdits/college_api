<?php

namespace App\Http\Resources;

use App\Models\LeaveType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class LeaveAllocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
//            'id' => $this->id,
            'user_id' => $this->user_id,
            'user_name' => User::find($this->user_id)->first_name.' '.User::find($this->user_id)->middle_name.' '.User::find($this->user_id)->last_name,
            'leave_type' => DB::select("SELECT leave_types.id, leave_types.name,total_leave FROM leave_lists
                    inner join leave_types on leave_types.id = leave_lists.leave_type_id
                    where leave_lists.user_id = ".$this->user_id)
        ];
    }
}
