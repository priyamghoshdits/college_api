<?php

namespace App\Http\Resources;

use App\Models\Routes;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class AssignVehicleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
//            'id' => $this->id,
            'route_id' => $this->route_id,
            'route_name' => Routes::find($this->route_id)->title,
            'route_fare' => Routes::find($this->route_id)->fare,
            'vehicle' => DB::select("select vehicle_id, vehicles.number from assign_vehicles
                inner join vehicles on vehicles.id = assign_vehicles.vehicle_id
                where assign_vehicles.route_id = ?",[$this->route_id]),
        ];
    }
}
