<?php

namespace App\Http\Controllers;

use App\Models\AgentPayment;
use App\Http\Requests\StoreAgentPaymentRequest;
use App\Http\Requests\UpdateAgentPaymentRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AgentPaymentController extends Controller
{
    public function save_agent_payment(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new AgentPayment();
        $data->user_id = $requestedData->user_id;
        $data->transaction_no = $requestedData->transaction_no;
        $data->date = $requestedData->date;
        $data->amount = $requestedData->amount;
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_agent_payment_details($id)
    {
        $feesStructure = new FeesStructureController();
        $agent = User::find($id);
//        $data = $agent->commission_flat? $this->get_admitted_student_by_agent($id) * $agent->commission_flat : ($agent->commission_percentage/100) * $feesStructure->get_student_by_agent_id($id);
        $data = [
            'total_commission' => $agent->commission_flat? $this->get_admitted_student_by_agent($id) * $agent->commission_flat : ($agent->commission_percentage/100) * $feesStructure->get_student_by_agent_id($id),
        ];
        return response()->json(['success'=>1,'data'=> $data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_admitted_student_by_agent($agent_id)
    {
       return count(User::join('student_details', 'users.id', '=', 'student_details.student_id')
            ->whereAgentId($agent_id)
            ->whereAdmissionStatus(1)->get());
    }

    /**
     * Display the specified resource.
     */
    public function show(AgentPayment $agentPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgentPayment $agentPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgentPaymentRequest $request, AgentPayment $agentPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgentPayment $agentPayment)
    {
        //
    }
}
