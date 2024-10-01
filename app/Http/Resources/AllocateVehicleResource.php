<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Semester;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllocateVehicleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $student = User::find($this->student_id);
        $vehicle = Vehicle::find($this->vehicle_id);
        return [
            'id' => $this->id,
            'course_id' => $this->course_id,
            'course_name' => Course::find($this->course_id)->course_name,
            'semester_id' => $this->semester_id,
            'semester_name' => Semester::find($this->semester_id)->name,
            'student_id' => $this->student_id,
            'student_name' => $student->first_name.' '.$student->middle_name.' '.$student->last_name,
            'date' => $this->date,
            'vehicle_id' => $this->vehicle_id,
            'vehicle_model' => $vehicle->model,
            'vehicle_number' => $vehicle->number,
        ];
    }
}
