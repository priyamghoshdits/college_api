<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Expense;
use App\Models\LibraryStock;
use App\Models\Notice;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $currentDate = Carbon::now()->subMonth();
        $currentYear = Carbon::now()->year;
        $previousMonth = Carbon::parse($currentDate)->format('m');
        $total_books = count(LibraryStock::get());

        $no_of_fees_received = count(Payment::select('student_id')
            ->whereMonth('created_at', '=', $previousMonth)
            ->distinct()
            ->get());

        $total_fees_received = Payment::whereMonth('created_at', '=', $previousMonth)->sum('amount');

        $total_expense = Expense::whereMonth('created_at', $previousMonth)->sum('amount');

        $total_student = count(User::whereUserTypeId(3)->get());

        $total_teacher = count(User::whereUserTypeId(2)->get());

        $total_accountant = count(User::whereUserTypeId(4)->get());

        $total_male_student = count(User::whereUserTypeId(3)->whereGender('male')->get());

        $total_female_student = count(User::whereUserTypeId(3)->whereGender('female')->get());

        $notices = Notice::get();

        $totalStudyMaterial = count(Content::orderBy('id', 'DESC')->whereType('study-material')->get());

        $total_assignment = count(Content::orderBy('id', 'DESC')->whereType('assignment')->get());

        //Student LIst

        $January = count(User::select('admission_date')
            ->whereUserTypeId(3)
            ->join('student_details', 'student_details.student_id', '=', 'users.id')
            ->whereMonth('admission_date', 1)->whereYear('admission_date', $currentYear)->get());
        $February = count(User::select('admission_date')
            ->whereUserTypeId(3)
            ->join('student_details', 'student_details.student_id', '=', 'users.id')
            ->whereMonth('admission_date', 2)->whereYear('admission_date', $currentYear)->get());
        $March = count(User::select('admission_date')
            ->whereUserTypeId(3)
            ->join('student_details', 'student_details.student_id', '=', 'users.id')
            ->whereMonth('admission_date', 3)->whereYear('admission_date', $currentYear)->get());
        $April = count(User::select('admission_date')
            ->whereUserTypeId(3)
            ->join('student_details', 'student_details.student_id', '=', 'users.id')
            ->whereMonth('admission_date', 4)->whereYear('admission_date', $currentYear)->get());
        $May = count(User::select('admission_date')
            ->whereUserTypeId(3)
            ->join('student_details', 'student_details.student_id', '=', 'users.id')
            ->whereMonth('admission_date', 5)->whereYear('admission_date', $currentYear)->get());
        $June = count(User::select('admission_date')
            ->whereUserTypeId(3)
            ->join('student_details', 'student_details.student_id', '=', 'users.id')
            ->whereMonth('admission_date', 6)->whereYear('admission_date', $currentYear)->get());
        $July = count(User::select('admission_date')
            ->whereUserTypeId(3)
            ->join('student_details', 'student_details.student_id', '=', 'users.id')
            ->whereMonth('admission_date', 7)->whereYear('admission_date', $currentYear)->get());
        $August = count(User::select('admission_date')
            ->whereUserTypeId(3)
            ->join('student_details', 'student_details.student_id', '=', 'users.id')
            ->whereMonth('admission_date', 8)->whereYear('admission_date', $currentYear)->get());
        $September = count(User::select('admission_date')
            ->whereUserTypeId(3)
            ->join('student_details', 'student_details.student_id', '=', 'users.id')
            ->whereMonth('admission_date', 9)->whereYear('admission_date', $currentYear)->get());
        $October = count(User::select('admission_date')
            ->whereUserTypeId(3)
            ->join('student_details', 'student_details.student_id', '=', 'users.id')
            ->whereMonth('admission_date', 10)->whereYear('admission_date', $currentYear)->get());
        $November = count(User::select('admission_date')
            ->whereUserTypeId(3)
            ->join('student_details', 'student_details.student_id', '=', 'users.id')
            ->whereMonth('admission_date', 11)->whereYear('admission_date', $currentYear)->get());
        $December = count(User::select('admission_date')
            ->whereUserTypeId(3)
            ->join('student_details', 'student_details.student_id', '=', 'users.id')
            ->whereMonth('admission_date', 12)->whereYear('admission_date', $currentYear)->get());

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
            (object)[
                "name" => "June",
                "series" => [
                    (object)[
                        "name" => "June",
                        "value" => $June
                    ]
                ]
            ],
            (object)[
                "name" => "July",
                "series" => [
                    (object)[
                        "name" => "July",
                        "value" => $July
                    ]
                ]
            ],
            (object)[
                "name" => "August",
                "series" => [
                    (object)[
                        "name" => "August",
                        "value" => $August
                    ]
                ]
            ],
            (object)[
                "name" => "September",
                "series" => [
                    (object)[
                        "name" => "September",
                        "value" => $September
                    ]
                ]
            ],
            (object)[
                "name" => "October",
                "series" => [
                    (object)[
                        "name" => "October",
                        "value" => $October
                    ]
                ]
            ],
            (object)[
                "name" => "November",
                "series" => [
                    (object)[
                        "name" => "November",
                        "value" => $November
                    ]
                ]
            ],
            (object)[
                "name" => "December",
                "series" => [
                    (object)[
                        "name" => "December",
                        "value" => $December
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
        return response()->json(['success' => 1, 'data' => $ret], 200, [], JSON_NUMERIC_CHECK);
    }
}
