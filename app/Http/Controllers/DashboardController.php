<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Expense;
use App\Models\LibraryStock;
use App\Models\Notice;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){
        $currentDate = Carbon::now()->subMonth();
        $previousMonth = Carbon::parse($currentDate)->format('m');
        $total_books = count(LibraryStock::get());
//        $total_fees_received = DB::select("SELECT DISTINCT student_id FROM payments where date(created_at) = ?",[]);

        $no_of_fees_received = count(Payment::select('student_id')
            ->whereMonth('created_at', '=', $previousMonth)
            ->distinct()
            ->get());

        $total_fees_received = Payment::whereMonth('created_at', '=', $previousMonth)->sum('amount');

        $total_expense = Expense::whereMonth('created_at',$previousMonth)->sum('amount');

        $total_student = count(User::whereUserTypeId(3)->get());

        $total_teacher = count(User::whereUserTypeId(2)->get());

        $total_accountant = count(User::whereUserTypeId(4)->get());

        $total_male_student = count(User::whereUserTypeId(3)->whereGender('male')->get());

        $total_female_student = count(User::whereUserTypeId(3)->whereGender('female')->get());

        $notices = Notice::get();

        $totalStudyMaterial = count(Content::orderBy('id', 'DESC')->whereType('study-material')->get());

        $total_assignment = count(Content::orderBy('id', 'DESC')->whereType('assignment')->get());

        $ret = [
            'total_books' => $total_books,
            'no_of_fees_received' => $no_of_fees_received,
            'total_fees_received' => $total_fees_received,
            'total_expense' => $total_expense,
            'total_student' => $total_student,
            'total_teacher' => $total_teacher,
            'total_male_student' => $total_male_student,
            'notice' => $notices,
            'studyMaterial' => $totalStudyMaterial,
            'total_assignment' => $total_assignment,
            'total_female_student' => $total_female_student,
            'total_accountant' => $total_accountant
        ];
        return response()->json(['success'=>1,'data'=>$ret], 200,[],JSON_NUMERIC_CHECK);
    }
}
