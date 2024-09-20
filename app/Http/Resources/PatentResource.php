<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date_of_acceptance' => $this->date_of_acceptance,
            'patent_authority' => $this->patent_authority,
            'file_url' => $this->file_name == null ? null : asset("patent/{$this->file_name}"),
        ];
    }
}
