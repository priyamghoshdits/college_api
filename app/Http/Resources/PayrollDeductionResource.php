<?php

namespace App\Http\Resources;

use App\Models\PayrollTypes;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PayrollDeductionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'payroll_type_id' => $this->payroll_type_id,
            'payroll_type_name' => PayrollTypes::find($this->payroll_type_id)->name,
            'amount' => $this->amount,
        ];
    }
}
