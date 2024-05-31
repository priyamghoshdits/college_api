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
        $currentYear = Carbon::now()->year;
        $previousMonth = Carbon::parse($currentDate)->format('m');
        $total_books = count(LibraryStock::get());

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

        //Student LIst

        $January = count(User::whereUserTypeId(3)->whereMonth('created_at',1)->whereYear('created_at',$currentYear)->get());
        $February = count(User::whereUserTypeId(3)->whereMonth('created_at',2)->whereYear('created_at',$currentYear)->get());
        $March = count(User::whereUserTypeId(3)->whereMonth('created_at',3)->whereYear('created_at',$currentYear)->get());
        $April = count(User::whereUserTypeId(3)->whereMonth('created_at',4)->whereYear('created_at',$currentYear)->get());
        $May = count(User::whereUserTypeId(3)->whereMonth('created_at',05)->whereYear('created_at',$currentYear)->get());
        $June = User::whereUserTypeId(3)->whereMonth('created_at',6)->whereYear('created_at',$currentYear)->get();
        $July = User::whereUserTypeId(3)->whereMonth('created_at',7)->whereYear('created_at',$currentYear)->get();
        $August = User::whereUserTypeId(3)->whereMonth('created_at',8)->whereYear('created_at',$currentYear)->get();

        $studentChart = [
            (object)[
                "name" => "January",
                "series" => [
                    (object)[
                        "name" => "January",
                        "value" => $January
                    ]
                ]
            ],
            (object)[
                "name" => "February",
                "series" => [
                    (object)[
                        "name" => "February",
                        "value" => $February
                    ]
                ]
            ],
            (object)[
                "name" => "March",
                "series" => [
                    (object)[
                        "name" => "March",
                        "value" => $March
                    ]
                ]
            ],
            (object)[
                "name" => "April",
                "series" => [
                    (object)[
                        "name" => "April",
                        "value" => $April
                    ]
                ]
            ],
            (object)[
                "name" => "May",
                "series" => [
                    (object)[
                        "name" => "May",
                        "value" => $May
                    ]
                ]
            ],
        ];

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
            'total_accountant' => $total_accountant,
            'student_chart' => $studentChart
        ];
        return response()->json(['success'=>1,'data'=>$ret], 200,[],JSON_NUMERIC_CHECK);
    }
}
