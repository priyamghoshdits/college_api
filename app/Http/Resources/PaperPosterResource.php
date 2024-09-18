<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaperPosterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "staff_id" => $this->staff_id,
            "staff_name" => User::find($this->staff_id)->first_name . ' ' . User::find($this->staff_id)->middle_name . ' ' . User::find($this->staff_id)->last_name,
            "topic_name" => $this->topic_name,
            "type" => $this->type,
            "venue" => $this->venue,
            "organized_by" => $this->organized_by,
            "seminer_topic" => $this->seminer_topic,
            "seminer_type" => $this->seminer_type,
            "date_from" => $this->date_from,
            "date_to" => $this->date_to,
            "duration" => $this->duration,
            "acivement" => $this->acivement,
            "file_name" => $this->file_name,
            'file_url' => $this->file_name != null ? asset("paper_poster/{$this->file_name}") : null,
        ];
    }
}
