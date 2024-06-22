<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JournalPublicationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'staff_id' => $this->staff_id,
            'staff_name' => User::find($this->staff_id)->first_name .' '.User::find($this->staff_id)->middle_name.' '.User::find($this->staff_id)->last_name,
            'journal_name' => $this->journal_name,
            'publication' => $this->publication,
            'topic_name' => $this->topic_name,
            'ugc_affiliation' => $this->ugc_affiliation,
            'university_name' => $this->university_name,
            'volume_page_number' => $this->volume_page_number,
            'issn_number' => $this->issn_number,
            'impact_factor' => $this->impact_factor,
        ];
    }
}
