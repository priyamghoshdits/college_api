<?php

namespace App\Http\Controllers;

use App\Http\Resources\AgentPaymentResource;
use App\Models\AgentPayment;
use App\Http\Requests\StoreAgentPaymentRequest;
use App\Http\Requests\UpdateAgentPaymentRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentPaymentController extends Controller
{
    public function save_agent_payment(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new AgentPayment();
        $data->user_id = $requestedData->user_id;
        $data->transaction_no = $requestedData->transaction_no;
        $data->date = $requestedData->date;
        $data->mode = $requestedData->mode;
        $data->amount = $requestedData->amount;
        $data->save();
        return response()->json(['success'=>1,'data'=> new AgentPaymentResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_agent_payment_details($id)
    {
        $feesStructure = new FeesStructureController();
        $agent = User::find($id);
//        $data = $agent->commission_flat? $this->get_admitted_student_by_agent($id) * $agent->commission_flat : ($agent->commission_percentage/100) * $feesStructure->get_student_by_agent_id($id);
        $data = [
            'total_commission' => $agent->commission_flat? $this->get_admitted_student_by_agent($id) * $agent->commission_flat : ($agent->commission_percentage/100) * $feesStructure->get_student_by_agent_id($id),
            'total_paid' => $this->get_total_payment_agent($id),
            'due_amount' => ($agent->commission_flat? $this->get_admitted_student_by_agent($id) * $agent->commission_flat : ($agent->commission_percentage/100) * $feesStructure->get_student_by_agent_id($id)) - $this->get_total_payment_agent($id)
        ];
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_admitted_student_by_agent($agent_id)
    {
       return count(User::join('student_details', 'users.id', '=', 'student_details.student_id')
            ->whereAgentId($agent_id)
            ->whereAdmissionStatus(1)->get());
    }

    public function get_total_payment_agent($agent_id)
    {
        return DB::select("SELECT ifnull(sum(amount),0) as amount FROM `agent_payments` where user_id = ?",[$agent_id])[0]->amount;
    }

    public function get_agent_payment()
    {
        $data = AgentPayment::orderBy('id','desc')->get();
        return response()->json(['success'=>1,'data'=>AgentPaymentResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_agent_payment(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = AgentPayment::find($requestedData->id);
        $data->user_id = $requestedData->user_id;
        $data->transaction_no = $requestedData->transaction_no;
        $data->date = $requestedData->date;
        $data->mode = $requestedData->mode;
        $data->amount = $requestedData->amount;
        $data->update();
        return response()->json(['success'=>1,'data'=>new AgentPaymentResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_agent_payment($id)
    {
        $data = AgentPayment::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>new AgentPaymentResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }
}
