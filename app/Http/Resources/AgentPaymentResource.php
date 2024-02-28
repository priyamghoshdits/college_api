<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgentPaymentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id ,
            'user_name' => User::find($this->user_id)->first_name.' '.User::find($this->user_id)->middle_name.' '.User::find($this->user_id)->last_name,
            'transaction_no' => $this->transaction_no,
            'date' => $this->date,
            'mode' => $this->mode,
            'amount' => $this->amount,
        ];
    }
}
