<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassStatusResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'started_by' => $this->started_by ?? null,
            'started_by_name' => $this->started_by ? User::find($this->started_by)->first_name.' '.User::find($this->started_by)->middle_name.' '.User::find($this->started_by)->last_name : null,
            'time_on' => $this->time_on,
            'start_latitude' => $this->start_latitude,
            'start_longitude' => $this->start_longitude,
            'stop_latitude' => $this->stop_latitude,
            'stop_longitude' => $this->stop_longitude,
            'ended_by' => $this->ended_by ?? null,
            'ended_by_name' => $this->ended_by ? User::find($this->ended_by)->first_name.' '.User::find($this->ended_by)->middle_name.' '.User::find($this->ended_by)->last_name : null,
            'ended_on' => $this->ended_on,
        ];
    }
}
