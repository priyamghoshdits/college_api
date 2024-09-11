<?php

namespace App\Http\Controllers;

use App\Models\Achivement;
use App\Models\Attendance;
use App\Models\Content;
use App\Models\Expense;
use App\Models\LibraryIssue;
use App\Models\LibraryStock;
use App\Models\Notice;
use App\Models\Payment;
use App\Models\StudentDetail;
use App\Models\User;
use App\Models\VirtualClass;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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

    public function dashboard_for_student()
    {
        $currentYear = Carbon::now()->year;
        $student_data = StudentDetail::whereStudentId(Auth::id())->first();
        $notices = Notice::get();
        $total_books = count(LibraryStock::get());
        $total_assignment = count(Content::orderBy('id', 'DESC')->whereType('assignment')->get());
        $totalStudyMaterial = count(Content::orderBy('id', 'DESC')->whereType('study-material')->get());
        $total_achivement = Achivement::whereStudent_id(Auth::id())->count();
        $total_issued_books = count(LibraryIssue::whereUserId(Auth::id())->whereReturned(0)->get());

        $live_class_list = VirtualClass::whereCourseId($student_data->course_id)->whereSemesterId($student_data->semester_id)->get();


        $January = Attendance::whereMonth('date', 1)->whereYear('date', $currentYear)->count();
        $February = Attendance::whereMonth('date', 2)->whereYear('date', $currentYear)->count();
        $March = Attendance::whereMonth('date', 3)->whereYear('date', $currentYear)->count();
        $April = Attendance::whereMonth('date', 4)->whereYear('date', $currentYear)->count();
        $May = Attendance::whereMonth('date', 5)->whereYear('date', $currentYear)->count();
        $June = Attendance::whereMonth('date', 6)->whereYear('date', $currentYear)->count();
        $July = Attendance::whereMonth('date', 7)->whereYear('date', $currentYear)->count();
        $August = Attendance::whereMonth('date', 8)->whereYear('date', $currentYear)->count();
        $September = Attendance::whereMonth('date', 9)->whereYear('date', $currentYear)->count();
        $October = Attendance::whereMonth('date', 10)->whereYear('date', $currentYear)->count();
        $November = Attendance::whereMonth('date', 11)->whereYear('date', $currentYear)->count();
        $December = Attendance::whereMonth('date', 12)->whereYear('date', $currentYear)->count();

        // return $July;

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
            'notice' => $notices,
            'live_class_list' => $live_class_list,
            'student_chart' => $studentChart,
            'total_assignment' => $total_assignment,
            'studyMaterial' => $totalStudyMaterial,
            'total_achivement' => $total_achivement,
            'total_issue_books' => $total_issued_books,
        ];

        return response()->json(['success' => 1, 'data' => $ret], 200, [], JSON_NUMERIC_CHECK);
    }
}
