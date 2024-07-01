<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Agent;
use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Models\AgentPayment;
use App\Models\FeesStructure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AgentController extends Controller
{
    public function get_agent()
    {
        $data = User::whereUserTypeId(5)->get();
        $feesStructure = new FeesStructureController();
        $agentPayment = new AgentPaymentController();
        //        $fees = FeesStructure::select('course_id','semester_id')->whereCourseId(2)->distinct()->get();
        //        dd($feesStructure->get_total_course_fees_by_course_id(2));
        foreach ($data as $agent) {
            $agent->admitted_student = count(User::join('student_details', 'users.id', '=', 'student_details.student_id')
                ->whereAgentId($agent['id'])
                ->whereAdmissionStatus(1)->get());
            $agent->non_admitted_student = count(User::join('student_details', 'users.id', '=', 'student_details.student_id')
                ->whereAgentId($agent['id'])
                ->whereAdmissionStatus(0)->get());
            //            $agent->due_payment = $agent['commission_flat'] ? ($agent['commission_flat'] * $agent->admitted_student) : ($agent['commission_percentage'] ? ($agent['commission_percentage'] / 100) * $agent->admitted_student: 0);
            $agent->total = $agent['commission_flat'] ? ($agent['commission_flat'] * $agent->admitted_student) : ($agent['commission_percentage'] ? ($agent['commission_percentage'] / 100) * $feesStructure->get_student_by_agent_id($agent['id']) : 0);
            $agent->total_paid = $agentPayment->get_total_payment_agent($agent['id']);
            $agent->due_payment = $agent->total - $agent->total_paid;
        }
        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_agent(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $pass = rand(100000, 999999);
        $data = new User();
        $data->first_name = $requestedData->first_name;
        $data->last_name = $requestedData->last_name;
        $data->mobile_no = $requestedData->mobile_no;
        $data->email = $requestedData->email;
        $data->password = $pass;
        $data->user_type_id = 5;
        $data->category_id = $requestedData->category_id;
        $data->franchise_id  = $request->user()->franchise_id;
        $data->commission_flat = $requestedData->commission_flat;
        $data->commission_percentage = $requestedData->commission_percentage;
        $data->status = 1;
        $data->save();

        $email_id = $data->email;

        dispatch(function () use ($data, $pass, $email_id) {
            Mail::send('welcome_password', array(
                'name' => $data->first_name . " " . $data->middle_name . " " . $data->last_name, 'password' => $pass
            ), function ($message) use ($email_id) {
                $message->from('rudkarsh@rgoi.in');
                $message->to($email_id);
                $message->subject('Forgot Passowrd');
            });
        })->afterResponse();
        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
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
        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_agent($id)
    {
        $data = User::find($id);
        $data->delete();
        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }

    public function get_student_by_agentId($id)
    {
        $member = User::select('*', 'student_details.id as student_details_id', 'users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->whereUserTypeId(3)
            ->whereAgentId($id)
            ->get();
        return response()->json(['success' => 1, 'data' => StudentResource::collection($member)], 200, [], JSON_NUMERIC_CHECK);
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
