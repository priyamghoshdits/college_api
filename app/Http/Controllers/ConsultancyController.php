<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConsultancyResource;
use App\Models\Consultancy;
use App\Http\Requests\StoreConsultancyRequest;
use App\Http\Requests\UpdateConsultancyRequest;
use Illuminate\Http\Request;

class ConsultancyController extends Controller
{
    public function save_consultation(Request $request)
    {
        foreach ($request['consultationArray'] as $list) {
            $consultancy = new Consultancy();
            $consultancy->staff_id = $list['staff_id'];
            $consultancy->project_consultancy = $list['project_consultancy'];
            $consultancy->sponsored_by = $list['sponsored_by'];
            $consultancy->consultant = $list['consultant'];
            $consultancy->amount = $list['amount'];
            $consultancy->duration = $list['duration'];
            $consultancy->status = $list['status'];
            $consultancy->save();
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_consultation(Request $request)
    {
        foreach ($request['consultationArray'] as $list) {
            $consultancy = Consultancy::find($list['id']);
            if ($consultancy){
                $consultancy->staff_id = $list['staff_id'];
                $consultancy->project_consultancy = $list['project_consultancy'];
                $consultancy->sponsored_by = $list['sponsored_by'];
                $consultancy->consultant = $list['consultant'];
                $consultancy->amount = $list['amount'];
                $consultancy->duration = $list['duration'];
                $consultancy->status = $list['status'];
                $consultancy->update();
            }else{
                $consultancy = new Consultancy();
                $consultancy->staff_id = $list['staff_id'];
                $consultancy->project_consultancy = $list['project_consultancy'];
                $consultancy->sponsored_by = $list['sponsored_by'];
                $consultancy->consultant = $list['consultant'];
                $consultancy->amount = $list['amount'];
                $consultancy->duration = $list['duration'];
                $consultancy->status = $list['status'];
                $consultancy->save();
            }
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function search_consultancy($staff_id = null)
    {
        if($staff_id == 'null'){
            $data = Consultancy::get();
        }else{
            $data = Consultancy::whereStaffId($staff_id)->get();
        }
        return response()->json(['success' => 1, 'data' =>ConsultancyResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_consultation($id)
    {
        $data = Consultancy::find($id);
        $data->delete();

        $data = Consultancy::get();
        return response()->json(['success' => 1, 'data' =>ConsultancyResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultancy $consultancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsultancyRequest $request, Consultancy $consultancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultancy $consultancy)
    {
        //
    }
}
