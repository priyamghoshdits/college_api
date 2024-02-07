<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Agent;
use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function get_agent()
    {
        $data = User::whereUserTypeId(5)->get();
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_agent(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $pass = rand(100000,999999);
        $data = new User();
        $data->first_name = $requestedData->first_name;
        $data->last_name = $requestedData->last_name;
        $data->mobile_no = $requestedData->mobile_no;
        $data->email = $requestedData->email;
        $data->password = $pass;
        $data->user_type_id = 5;
        $data->category_id = $requestedData->category_id;
        $data->franchise_id  = $request->user()->franchise_id ;
        $data->commission_flat = $requestedData->commission_flat;
        $data->commission_percentage = $requestedData->commission_percentage;
        $data->status = 1;
        $data->save();
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_agent(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = User::find($requestedData->id);
        $data->first_name = $requestedData->first_name;
        $data->last_name = $requestedData->last_name;
        $data->mobile_no = $requestedData->mobile_no;
        $data->email = $requestedData->email;
        $data->category_id = $requestedData->category_id;
        $data->commission_flat = $requestedData->commission_flat;
        $data->commission_percentage = $requestedData->commission_percentage;
        $data->update();
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_agent($id)
    {
        $data = Agent::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_student_by_agentId($id)
    {
        $member = User::select('*','student_details.id as student_details_id','users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->whereUserTypeId(3)
            ->whereAgentId($id)
            ->get();
        return response()->json(['success'=>1,'data'=> StudentResource::collection($member)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgentRequest $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
