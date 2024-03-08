<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VirtualMeetingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_type_id' => $this->user_type_id,
            'user_type_name' => UserType::find($this->user_type_id)->name,
            'topic' => $this->topic,
            'platform' => $this->platform,
            'link' => $this->link,
            'date_of_meeting' => $this->date_of_meeting,
            'time_of_meeting' => $this->time_of_meeting,
            'meeting_duration' => $this->meeting_duration,
            'meeting_start_before' => $this->meeting_start_before,
        ];
    }
}
