<?php

namespace App\Http\Resources;

use App\Models\IncomeHead;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IncomeResource extends JsonResource
{    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'income_head_id' => $this->income_head_id,
            'income_head_name' => IncomeHead::find($this->income_head_id)->name,
            'name' => $this->name,
            'invoice_number' => $this->invoice_number,
            'date' => $this->date,
            'amount' => $this->amount,
            'description' => $this->description,
        ];
    }
}
