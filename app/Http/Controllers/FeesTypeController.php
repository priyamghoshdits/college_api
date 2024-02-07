<?php

namespace App\Http\Controllers;

use App\Models\FeesType;
use App\Http\Requests\StoreFeesTypeRequest;
use App\Http\Requests\UpdateFeesTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeesTypeController extends Controller
{
    public function get_fees_type()
    {
        $data = FeesType::get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_fees_type(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $feesType = new FeesType();
        $feesType->name = $requestData->name;
        $feesType->save();
        return response()->json(['success'=>1,'data'=>$feesType], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_fees_type(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $feesType = FeesType::find($requestData->id);
        $feesType->name = $requestData->name;
        $feesType->update();
        return response()->json(['success'=>1,'data'=>$feesType], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_fees_type($id)
    {
        $feesType = FeesType::find($id);
        $feesType->delete();
        return response()->json(['success'=>1,'data'=>$feesType], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_due_fees($id){
        $data = new SemesterController();
        $data1 = count(json_decode($data->semester_by_course(3)->content(),true)['data']);
        return response()->json(['success'=>1,'data'=>$data1], 200,[],JSON_NUMERIC_CHECK);
    }

    public function testMail()
    {
        set_time_limit(100);
        $email_id = "priyamghosh.dits@gmail.com";
         Mail::send('welcome',array('name'=>"Virat Gandhi") , function ($message) use($email_id) {
                     $message->from('rudkarsh@rgoi.in');
                     $message->to($email_id);
                     $message->subject('Test mail');
                 });

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeesTypeRequest $request, FeesType $feesType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeesType $feesType)
    {
        //
    }
}
