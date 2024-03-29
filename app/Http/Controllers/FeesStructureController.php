<?php

namespace App\Http\Controllers;

use App\Http\Resources\FeesStructureResource;
use App\Models\CourseGroup;
use App\Models\FeesStructure;
use App\Http\Requests\StoreFeesStructureRequest;
use App\Http\Requests\UpdateFeesStructureRequest;
use App\Models\FeesType;
use App\Models\Payment;
use App\Models\PreAdmissionPayment;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class FeesStructureController extends Controller
{
    public function get_fees_structure()
    {
        $data = FeesStructure::get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_fees_structure(Request $request)
    {
        $requestedData = $request->json()->all();

        foreach ($requestedData as $item){
            $feesStructure = new FeesStructure();
            $feesStructure->course_id = $item['course_id'];
            $feesStructure->semester_id = $item['semester_id'];
            $feesStructure->fees_type_id = $item['fees_type_id'];
            $feesStructure->amount = $item['amount'];
            $feesStructure->save();
        }

        return response()->json(['success'=>1,'data'=>$requestedData], 200,[],JSON_NUMERIC_CHECK);


//        return response()->json(['success'=>1,'data'=>$feesStructure], 200,[],JSON_NUMERIC_CHECK);
    }
    public function get_fees_structure_by_course_id($course_id)
    {
        $data = FeesStructure::select('course_id','semester_id')->whereCourseId($course_id)->distinct()->get();
        return response()->json(['success'=>1,'data'=>FeesStructureResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_total_course_fees_by_course_id($course_id){
        $data = FeesStructure::select('course_id','semester_id')->whereCourseId($course_id)->distinct()->first();
        return DB::select("SELECT sum(amount) as total FROM fees_structures
                inner join fees_types on fees_structures.fees_type_id = fees_types.id
                where fees_structures.course_id = ? and fees_structures.semester_id = ?",[$data->course_id,$data->semester_id])[0]->total;
    }

    public function get_student_by_agent_id($agent_id){
        $data = User::join('student_details', 'users.id', '=', 'student_details.student_id')
            ->whereAgentId($agent_id)
            ->whereAdmissionStatus(1)->get();
        $total = 0;
        foreach ($data as $item) {
            $total = $total + floatval($this->get_total_course_fees_by_course_id($item['course_id']));
        }
        return $total;
    }


    public function delete_fees_structure(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $course_id = $requestedData->course_id;
        $semester_id = $requestedData->semester_id;

        foreach ($requestedData->fees_types as $item){
            $feesStructure = FeesStructure::whereCourseId($course_id)->whereSemesterId($semester_id)->whereFeesTypeId($item['fees_type_id'])->first();
            $feesStructure->delete();
        }
        return response()->json(['success'=>1], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_fees_structure(Request $request)
    {

        $requestedData = $request->json()->all();

        foreach ($requestedData as $item){
            $feesStructure = FeesStructure::whereCourseId($item['course_id'])->whereSemesterId($item['semester_id'])->whereFeesTypeId($item['fees_type_id'])->first();
            if($feesStructure){
                $feesStructure->amount = $item['amount'];
                $feesStructure->update();
            }else {
                $feesStructure = new FeesStructure();
                $feesStructure->course_id = $item['course_id'];
                $feesStructure->semester_id = $item['semester_id'];
                $feesStructure->fees_type_id = $item['fees_type_id'];
                $feesStructure->amount = $item['amount'];
                $feesStructure->save();
            }
        }

        $feesStructure = FeesStructure::whereCourseId($requestedData[0]['course_id'])->whereSemesterId($requestedData[0]['semester_id'])->get();
        $database_fees_type_id = [];
        $req_fees_type_id = [];
        foreach ($feesStructure as $item){
            $database_fees_type_id[] = $item['fees_type_id'];
        }
        foreach ($requestedData as $item){
            $req_fees_type_id[] = $item['fees_type_id'];
        }

        $arr = array_diff($database_fees_type_id,$req_fees_type_id);

        foreach ($arr as $item){
            $data = FeesStructure::whereCourseId($requestedData[0]['course_id'])->whereSemesterId($requestedData[0]['semester_id'])->whereFeesTypeId($item)->first();
            $data->delete();
        }

        return response()->json(['success'=>1], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_student_fees_details($student_id)
    {
        $ret = [];
        $paymentController = new PaymentController();
        $studentDetails = User::select('*', 'users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->whereUserTypeId(3)
            ->where('users.id',$student_id)
            ->first();
        $courseId = $studentDetails->course_id;
        $semesterId = $studentDetails->current_semester_id;
        $advancePayment = (PreAdmissionPayment::whereUserId($student_id)->first())?(PreAdmissionPayment::whereUserId($student_id)->first())->amount:0;

        $data = DB::select("SELECT DISTINCT course_id, semester_id FROM fees_structures where course_id = ? and semester_id = ?",[$courseId,$semesterId]);

        $myArray = [];

        foreach ($data as $list){
            $temp = [
                'total_amount' => $this->get_total_amount($courseId,$semesterId),
                'name' => Semester::find($list->semester_id)->name,
                'total_paid' => $paymentController->get_student_amount($student_id,$courseId,$semesterId),
                'discount' => $paymentController->get_total_discount($student_id,$courseId,$semesterId),
                'scholarship_code' => (DB::select("SELECT scholarship_code FROM discounts where student_id = ? and course_id = ? and semester_id = ?",[$student_id,$courseId,$semesterId])[0]->scholarship_code) ?? null,
                'remaining' => $this->get_total_amount($courseId,$semesterId) - $paymentController->get_student_amount($student_id,$courseId,$semesterId) - $paymentController->get_total_discount($student_id,$courseId,$semesterId)
            ];

            $myArray[] = (object) $temp;
        }

        return response()->json(['success'=>1,'data'=>$myArray, 'advance_payment' => $advancePayment], 200,[],JSON_NUMERIC_CHECK);

    }

    public function get_total_amount($courseId, $semesterId)
    {
        $data = DB::select('SELECT sum(amount) as total FROM fees_structures
                inner join fees_types on fees_structures.fees_type_id = fees_types.id
                where fees_structures.course_id = ? and fees_structures.semester_id = ?',[$courseId,$semesterId]);

        return $data[0]->total;
    }
}
