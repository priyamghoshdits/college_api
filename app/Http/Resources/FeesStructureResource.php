<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\FeesType;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class FeesStructureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'semester_id' => $this->semester_id,
            'semester_name' => Semester::find($this->semester_id)->name,
            'course_id' => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            'fees_types' => DB::select("SELECT fees_type_id, amount, fees_types.name as fees_type_name FROM fees_structures
                inner join fees_types on fees_structures.fees_type_id = fees_types.id
                where fees_structures.course_id = ? and fees_structures.semester_id = ?",[$this->course_id,$this->semester_id]),
            'amount' => DB::select("SELECT sum(amount) as total FROM fees_structures
                inner join fees_types on fees_structures.fees_type_id = fees_types.id
                where fees_structures.course_id = ? and fees_structures.semester_id = ?",[$this->course_id,$this->semester_id])[0]->total
        ];
    }
}
