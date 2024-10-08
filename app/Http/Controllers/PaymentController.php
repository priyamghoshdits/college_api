<?php

namespace App\Http\Controllers;

use App\Http\Resources\FeesCollectionResource;
use App\Http\Resources\PaymentResource;
use App\Models\Course;
use App\Models\Discount;
use App\Models\FeesStructure;
use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function get_payment()
    {
        $payment = Payment::get();
        return response()->json(['success'=>1,'data'=>$payment], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_payment(Request $request)
    {
        $requestedData = (object)$request->json()->all();

        $studentDetails = User::select('*', 'users.id as id')
            ->leftjoin('student_details', 'users.id', '=', 'student_details.student_id')
            ->whereUserTypeId(3)
            ->where('users.id',$request['student_id'])
            ->first();
        $courseId = $studentDetails->course_id;
        $semester_id = $studentDetails->current_semester_id;

        if ($files = $request->file('file')) {
            // Define upload path
            $destinationPath = public_path('/payment_receipt/'); // upload path
            // Upload Orginal Image
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $request['file_name'];
        }

        $payment = new Payment();
        $payment->student_id = $request['student_id'];
        $payment->semester_id = $semester_id;
        $payment->amount = $request['amount'];
        $payment->course_id = $courseId;
        $payment->paid_on = $request['paid_on'];
        $payment->transaction_id = $request->transaction_id;
//        $payment->paid_on =Carbon::today();
        $payment->mode = $request['mode'];
        $payment->description = $request['description'] ?? null;
        $payment->file_name = $file_name ?? null;
        $payment->received_by = $request->user()->id;
        $payment->save();

        return response()->json(['success'=>1,'data'=>$payment], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_payment(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $payment = Payment::find($requestedData->id);
        $payment->student_id = $requestedData->student_id ?? $payment->student_id;
        $payment->paid_on =$requestedData->paid_on ?? $requestedData->paid_on;
        $payment->transaction_id =$requestedData->transaction_id ?? $requestedData->transaction_id;
        $payment->amount =$requestedData->amount ?? $payment->amount;
        $payment->mode =$requestedData->mode ?? $payment->mode;
        $payment->description = $requestedData->description ?? $payment->description;
        $payment->update();
        return response()->json(['success'=>1,'data'=>$payment], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_payment($id)
    {
        $payment = Payment::find($id);
        if (file_exists(public_path() . '/payment_receipt/' . $payment->file_name)) {
            File::delete(public_path() . '/payment_receipt/' . $payment->file_name);
        }
        $payment->delete();
        return response()->json(['success'=>1,'data'=>$payment], 200,[],JSON_NUMERIC_CHECK);
    }

    public function student_total_paid($id)
    {
        $data = DB::select("SELECT payments.id,course_id,ifnull(semesters.name, fees_types.name) as name,amount,paid_on, mode, payments.description FROM payments
            left join semesters on semesters.id = payments.semester_id
            left join fees_types on fees_types.id = payments.fees_type_id
            where payments.student_id = ".$id);

        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_student_amount($studentId, $course_id, $semester_id)
    {
        $data = Payment::whereStudentId($studentId)->whereCourseId($course_id)->whereSemesterId($semester_id)->get();
        $total = 0;
        foreach ($data as $list){
            $total = $total + $list['amount'];
        }
        return $total;
    }

    public function get_total_discount($studentId, $course_id, $semester_id)
    {
        $data = Discount::whereStudentId($studentId)->whereCourseId($course_id)->whereSemesterId($semester_id)->get();
        $total = 0;
        foreach ($data as $list){
            $total = $total + $list['amount'];
        }
        return $total;
    }

    public function get_payment_by_studentId($id){
        $data = Payment::whereStudentId($id)->get();
        return response()->json(['success'=>1,'data'=>PaymentResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function upload_fees_receipt(Request $request){
        if ($files = $request->file('file')) {
            // Define upload path
            $destinationPath = public_path('/payment_receipt/'); // upload path
            // Upload Orginal Image
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $payment = Payment::find($request['id']);
            $payment->file_name = $request['file_name'];
            $payment->update();
            return response()->json(['success'=>1,'data'=>$payment], 200,[],JSON_NUMERIC_CHECK);
        }

    }

    public function test_func(Request $request){

        // Define your connection details
        $connection = [
            'driver' => 'sqlsrv',
            'host' => '203.163.224.169,1443\SQLEXPRESS',
            'database' => 'etimetracklite1',
            'port' => '1433',
            'username' => 'sa',
            'password' => 'test@123',
        ];

        // Create a connection dynamically
        DB::purge('sqlsrv');
        config(['database.connections.sqlsrv_dynamic' => $connection]);

        $data = DB::connection('sqlsrv_dynamic')->table('Attendance_Data')->get();

        return $data;
    }

    public function get_fees_collection_report(Request $request){

        $requestedData = (object)$request->json()->all();

        $course_id = $requestedData->course_id;
        $semester_id = $requestedData->semester_id;
        $from_date = $requestedData->from_date;
        $to_date = $requestedData->to_date;

        $data = Payment::whereCourseId($course_id)
            ->whereSemesterId($semester_id)
            ->whereBetween('paid_on',[$from_date,$to_date])
            ->orderBy('paid_on','desc')
            ->get();

        return response()->json(['success'=>1,'data'=>FeesCollectionResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_due_fees_report(){
        $users = User::select( '*','users.id as user_id','student_details.id as student_details_id')->join('student_details', 'student_details.student_id', '=', 'users.id')->whereAdmissionStatus(1)->get();
        $ret_arr = [];
        $course = DB::select("select table1.course_id, table1.semester_id, table1.amount, semesters.name, courses.course_name from(SELECT course_id,semester_id, sum(amount) as amount FROM `fees_structures`
            group by semester_id,course_id) as table1
            inner join semesters on semesters.id = table1.semester_id
            inner join courses on courses.id = table1.course_id");
        foreach ($users as $user){
            $courseSemDetails = array_filter($course, function ($obj) use ($user) {
                return $obj->course_id == $user['course_id'];
            });
            foreach ($courseSemDetails as $list){
                $list->total_paid = DB::select("SELECT ifnull(sum(amount),0) as amount FROM payments where course_id = ? and semester_id = ? and student_id = ?",[$list->course_id,$list->semester_id,$user['user_id']])[0]->amount;
                $list->discount = DB::select("SELECT ifnull(sum(amount),0) as amount FROM discounts where course_id = ? and semester_id = ? and student_id = ?",[$list->course_id,$list->semester_id,$user['user_id']])[0]->amount;
            }
            $a = [
                'user_id' => $user['user_id'],
                'user_name' => $user['first_name'].' '.$user['middle_name'].' '.$user['last_name'],
                'course_id' => $user['course_id'],
                'course_name' => Course::find($user['course_id'])->course_name,
                'semester_id' => $user['current_semester_id'],
                'payment_details' => $courseSemDetails,
                'book_fine' => DB::select("select ifnull(sum(fine),0) as amount from library_issues where user_id = ?",[$user['user_id']])[0]->amount
            ];
            $ret_arr[] = $a;
        }

        return response()->json(['success'=>1,'data'=>$ret_arr], 200,[],JSON_NUMERIC_CHECK);
    }
}
