<?php

namespace App\Http\Resources;

use App\Models\ExpenseHead;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'expense_head_id' => $this->expense_head_id,
            'expense_head_name' => ExpenseHead::find($this->expense_head_id)->name,
            'name' => $this->name,
            'invoice_number' => $this->invoice_number,
            'date' => $this->date,
            'amount' => $this->amount,
            'description' => $this->description,
        ];
    }
}
