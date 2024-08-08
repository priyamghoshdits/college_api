<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PayslipUploadResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'staff_id' => $this->staff_id,
            'staff_name' =>User::find($this->staff_id)->first_name.' '.User::find($this->staff_id)->middle_name.' '.User::find($this->staff_id)->last_name,
            'month' => $this->month,
            'file_name' => $this->file_name,
            'file_url' => $this->file_name != null ? asset("manual_payslips/{$this->file_name}") : null,
        ];
    }
}
