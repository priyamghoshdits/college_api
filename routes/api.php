<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectGroupController;
use App\Http\Controllers\AssignSemesterTeacherController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SemesterTimetableController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeesTypeController;
use App\Http\Controllers\WeekDaysController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeesStructureController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\LibraryStockController;
use App\Http\Controllers\LibraryIssueController;
use App\Http\Controllers\HotelTypeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\HotelDetailsController;
use App\Http\Controllers\ItemTypesController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\InternshipProviderController;
use App\Http\Controllers\InternshipDetailsController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LeaveListController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\SubjectDetailsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AnswersheetController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\MenuManagementController;
use App\Http\Controllers\RolesAndPermissionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\StaffAttendanceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//LOGIN PART
Route::post("login",[UserController::class,'login']);
Route::get("forgotPassword/{email_id}",[UserController::class,'forgot_password']);

Route::get("initilialize",[RolesAndPermissionController::class,'initilialize']);


Route::group(['middleware' => 'auth:sanctum'],function(){
    //LOGOUT
    Route::get("logout",[UserController::class,'logout']);

    //HOLIDAY
    Route::post("saveHolidayForWholeYear",[HolidayController::class,'holiday_for_whole_year']);
    Route::post("saveHoliday",[HolidayController::class,'save_holiday']);
    Route::get("getHolidayByMonth/{month}",[HolidayController::class,'get_holiday_list_by_month']);
    Route::post("updateHoliday",[HolidayController::class,'update_holiday']);
    Route::get("deleteHoliday/{id}",[HolidayController::class,'delete_holiday']);

    //RESET PASSWORD
    Route::post("resetPassword",[UserController::class,'reset_password']);

    //VALIDATE STUDENT AND STAFF ID
    Route::get("checkId/{id}",[MemberController::class,'check_id']);

    // GET ROLES AND PERMISSION
    Route::get("getRolesAndPermission",[RolesController::class,'get_roles_and_permission']);
    Route::get("getRolesAndPermissionForUpdate",[RolesController::class,'get_roles_and_permission_for_update']);
    Route::get("updateRoleAndPermissions/{id}",[RolesController::class,'update_role_and_permissions']);

    //UPLOAD USER PROFILE PICTURE
    Route::post("uploadProfilePicSelf",[MemberController::class,'upload_profile_picture']);

    //MENU MANAGEMENT
    Route::get("getMenuManagement",[MenuManagementController::class,'get_menu_management']);
    Route::get("getMenuForUpdate",[MenuManagementController::class,'get_menu_for_update']);
    Route::get("updateMenuManagement/{id}",[MenuManagementController::class,'active_deactivate_menu']);

    // STUDENT
    Route::post("saveStudent",[UserController::class,'save_student']);
    Route::post("updateStudent",[UserController::class,'update_student']);
    Route::get("deleteMember/{id}",[MemberController::class,'delete_member']);
    Route::get("memberStatus/{id}",[MemberController::class,'member_status']);
    Route::post("saveMember",[UserController::class,'save_member']);
    Route::post("updateMember",[UserController::class,'update_member']);

    //LIBRARY
    Route::get("getLibraryDetails",[LibraryStockController::class,'get_library_details']);
    Route::post("saveLibraryDetails",[LibraryStockController::class,'save_library_details']);
    Route::post("updateLibraryDetails",[LibraryStockController::class,'update_library_details']);
    Route::get("deleteLibraryDetails/{id}",[LibraryStockController::class,'delete_library_details']);

    //LIBRARY ISSUE
    Route::get("getIssuedBooks",[LibraryIssueController::class,'get_issued_books']);
    Route::post("saveIssuedBooks",[LibraryIssueController::class,'save_issue_books']);
    Route::post("updateIssuedBooks",[LibraryIssueController::class,'update_issue_books']);
    Route::get("deleteIssuedBooks/{id}",[LibraryIssueController::class,'delete_issue_books']);
    Route::get("updateReturnStatus/{id}",[LibraryIssueController::class,'update_return_status']);

    //GET HOTEL TYPES
    Route::get("getHostelTypes",[HotelTypeController::class,'get_hotel_type']);

    //HOSTEL
    Route::get("getHostels",[HotelController::class,'get_hostels']);
    Route::post("saveHostels",[HotelController::class,'save_hostels']);
    Route::post("updateHostels",[HotelController::class,'update_hostels']);
    Route::get("deleteHostels/{id}",[HotelController::class,'delete_hostels']);

    //ROOM TYPE
    Route::get("getRoomType",[RoomTypeController::class,'get_room_type']);
    Route::post("saveRoomType",[RoomTypeController::class,'save_room_type']);
    Route::post("updateRoomType",[RoomTypeController::class,'update_room_type']);
    Route::get("deleteRoomType/{id}",[RoomTypeController::class,'delete_room_type']);

    //HOSTEL DETAILS
    Route::get("getRoomDetails",[HotelDetailsController::class,'get_room_details']);
    Route::post("saveRoomDetails",[HotelDetailsController::class,'save_room_details']);
    Route::post("updateRoomDetails",[HotelDetailsController::class,'update_room_details']);
    Route::get("deleteRoomDetails/{id}",[HotelDetailsController::class,'delete_room_details']);

    //SEMESTER
    Route::get("getSemester",[SemesterController::class,'get_semester']);
    Route::post("saveSemester",[SemesterController::class,'save_semester']);
    Route::post("updateSemester",[SemesterController::class,'update_semester']);
    Route::get("deleteSemester/{id}",[SemesterController::class,'delete_semester']);

    //INVENTORY ITEM CATEGORY
    Route::get("getItemCategory",[ItemTypesController::class,'get_item_category']);
    Route::post("saveItemCategory",[ItemTypesController::class,'save_item_category']);
    Route::post("updateItemCategory",[ItemTypesController::class,'update_item_category']);
    Route::get("deleteItemCategory/{id}",[ItemTypesController::class,'delete_item_category']);

    //SUBJECT
    Route::get("getSubject",[SubjectController::class,'get_subject']);
    Route::post("saveSubject",[SubjectController::class,'save_subject']);
    Route::post("updateSubject",[SubjectController::class,'update_subject']);
    Route::get("deleteSubject/{id}",[SubjectController::class,'delete_subject']);

    //INVENTORY ITEM
    Route::get("getInventoryItems",[InventoryItemController::class,'get_inventory_items']);
    Route::post("saveInventoryItems",[InventoryItemController::class,'save_inventory_items']);
    Route::post("updateInventoryItems",[InventoryItemController::class,'update_inventory_items']);
    Route::get("deleteInventoryItems/{id}",[InventoryItemController::class,'delete_inventory_items']);

    //UPLOAD PROFILE IMAGE
    Route::post("uploadProfilePic",[MemberController::class,'upload_file']);
    Route::post("promoteStudents",[MemberController::class,'promote_students']);

    // GET ALL MEMBERS
    Route::get("getAllMembers",[MemberController::class,'get_all_members']);
    Route::get("getTeachers",[MemberController::class,'get_teachers']);
    Route::get("getStudents",[MemberController::class,'get_students']);
    Route::get("getTeacherByCourseAndSem/{course_id}/{semester_id}",[MemberController::class,'get_teacher_by_course_and_semester']);

    //INTERNSHIP PROVIDER
    Route::get("getInternshipProvider",[InternshipProviderController::class,'get_internship_providers']);
    Route::post("saveInternshipProvider",[InternshipProviderController::class,'save_internship_provider']);
    Route::post("updateInternshipProvider",[InternshipProviderController::class,'update_internship_provider']);
    Route::get("deleteInternshipProvider/{id}",[InternshipProviderController::class,'delete_internship_provider']);

    //INTERNSHIP DETAILS
    Route::get("getInternshipDetails",[InternshipDetailsController::class,'get_internship_details']);
    Route::post("saveInternshipDetails",[InternshipDetailsController::class,'save_internship_details']);
    Route::post("updateInternshipDetails",[InternshipDetailsController::class,'update_internship_details']);
    Route::get("deleteInternshipDetails/{id}",[InternshipDetailsController::class,'delete_internship_details']);

    //SESSION
    Route::get("getSession",[SessionController::class,'get_session']);
    Route::post("saveSession",[SessionController::class,'save_session']);
    Route::post("updateSession",[SessionController::class,'update_session']);
    Route::get("deleteSession/{id}",[SessionController::class,'delete_session']);

    //LEAVE TYPE
    Route::get("getLeaveType",[LeaveTypeController::class,'get_leave_type']);
    Route::post("saveLeaveType",[LeaveTypeController::class,'save_leave_type']);
    Route::post("updateLeaveType",[LeaveTypeController::class,'update_leave_type']);
    Route::get("deleteLeaveType/{id}",[LeaveTypeController::class,'delete_leave_type']);

    //LEAVE LIST
    Route::get("getLeaveList",[LeaveListController::class,'get_leave_list']);
    Route::post("saveLeaveList",[LeaveListController::class,'save_leave_list']);
    Route::get("deleteLeaveList/{id}",[LeaveListController::class,'delete_leave_list']);

    //LEAVE
    Route::get("getLeavesBy/{user_id}/{leave_type_id}",[LeaveController::class,'get_leave_by_userId_and_leaveTypeId']);
    Route::post("saveLeave",[LeaveController::class,'save_leave']);
    Route::get("getLeave",[LeaveController::class,'get_leave_details']);
    Route::get("deleteLeave/{id}",[LeaveController::class,'delete_leave']);
    Route::post("updateLeave",[LeaveController::class,'update_leave']);
    Route::get("updateApproval/{id}/{status}",[LeaveController::class,'update_approval']);

    //COURSE API
    Route::get("getCourse",[CourseController::class,'get_course']);
    Route::post("saveCourse",[CourseController::class,'save_course']);
    Route::post("updateCourse",[CourseController::class,'update_course']);
    Route::get("deleteCourse/{id?}",[CourseController::class,'delete_course']);

    //NOTICES
    Route::get("getNotices",[NoticeController::class,'get_notices']);
    Route::post("saveNotices",[NoticeController::class,'save_notices']);
    Route::post("updateNotices",[NoticeController::class,'update_notices']);
    Route::get("deleteNotice/{id}",[NoticeController::class,'delete_notices']);

    //USER TYPE
    Route::get("getUserTypes",[UserTypeController::class,'get_user_types']);
    Route::post("saveUserTypes",[UserTypeController::class,'save_user_type']);
    Route::post("updateUserTypes",[UserTypeController::class,'update_user_type']);
    Route::get("deleteUserTypes/{id}",[UserTypeController::class,'delete_user_type']);

    //SUBJECT DETAILS
    Route::get("getSubjectDetails",[SubjectDetailsController::class,'get_subject_details']);
    Route::post("saveSubjectDetails",[SubjectDetailsController::class,'save_subject_details']);
    Route::post("updateSubjectDetails",[SubjectDetailsController::class,'update_subject_details']);
    Route::get("deleteSubjectDetails/{id?}",[SubjectDetailsController::class,'delete_subject_details']);

    //QUESTIONS
    Route::get("getQuestions",[QuestionController::class,'get_questions']);
    Route::post("saveQuestions",[QuestionController::class,'save_questions']);
    Route::post("updateQuestions",[QuestionController::class,'update_questions']);
    Route::get("updateStatus/{id}",[QuestionController::class,'updateStatus']);
    Route::post("deleteQuestion",[QuestionController::class,'delete_questions']);
//    Route::get("deleteSubjectDetails/{id?}",[QuestionController::class,'delete_subject_details']);

    //FEES TYPE
    Route::get("getFeesType",[FeesTypeController::class,'get_fees_type']);
    Route::post("saveFeesType",[FeesTypeController::class,'save_fees_type']);
    Route::post("updateFeesType",[FeesTypeController::class,'update_fees_type']);
    Route::get("deleteFeesType/{id}",[FeesTypeController::class,'delete_fees_type']);

    //FEES STRUCTURE
    Route::get("getFeesStructure",[FeesStructureController::class,'get_fees_structure']);
    Route::get("getFeesStructureByCourseId/{course_id}",[FeesStructureController::class,'get_fees_structure_by_course_id']);
    Route::post("saveFeesStructure",[FeesStructureController::class,'save_fees_structure']);
    Route::post("updateFeesStructure",[FeesStructureController::class,'update_fees_structure']);
    Route::post("deleteFeesStructure",[FeesStructureController::class,'delete_fees_structure']);
    Route::get("getStudentFeesDetails/{id}",[FeesStructureController::class,'get_student_fees_details']);

    //DISCOUNT
    Route::get("getDiscount",[DiscountController::class,'get_discount']);
    Route::post("saveDiscount",[DiscountController::class,'save_discount']);
    Route::post("updateDiscount",[DiscountController::class,'update_discount']);
    Route::get("deleteDiscount/{id}",[DiscountController::class,'delete_discount']);

    //DEPARTMENT
    Route::get("getDepartment",[DepartmentController::class,'get_department']);
    Route::post("saveDepartment",[DepartmentController::class,'save_department']);
    Route::post("updateDepartment",[DepartmentController::class,'update_department']);
    Route::get("deleteDepartment/{id}",[DepartmentController::class,'delete_department']);

    //DESIGNATION
    Route::get("getDesignation",[DesignationController::class,'get_designation']);
    Route::post("saveDesignation",[DesignationController::class,'save_designation']);
    Route::post("updateDesignation",[DesignationController::class,'update_designation']);
    Route::get("deleteDesignation/{id}",[DesignationController::class,'delete_designation']);

    //PAYMENT
    Route::get("getPayment",[PaymentController::class,'get_payment']);
    Route::post("savePayment",[PaymentController::class,'save_payment']);
    Route::post("updatePayment",[PaymentController::class,'update_payment']);
    Route::get("deletePayment/{id}",[PaymentController::class,'delete_payment']);
    Route::get("getPaymentByStudentID/{id}",[PaymentController::class,'get_payment_by_studentId']);
    Route::post("uploadFeesReceipt",[PaymentController::class,'upload_fees_receipt']);

    //AGENT
    Route::get("getAgent",[AgentController::class,'get_agent']);
    Route::post("saveAgent",[AgentController::class,'save_agent']);
    Route::post("updateAgent",[AgentController::class,'update_agent']);
    Route::get("deleteAgent/{id}",[AgentController::class,'delete_agent']);
    Route::get("getStudentByAgentId/{id}",[AgentController::class,'get_student_by_agentId']);

    //ANS SHEET
    Route::get("getAnswerSheet",[AnswersheetController::class,'get_answersheet']);
    Route::post("saveAnswerSheet",[AnswersheetController::class,'save_answersheet']);

    //Content
    Route::get("getContent",[ContentController::class,'get_content']);
    Route::post("saveContent",[ContentController::class,'save_content']);
    Route::get("getAssignment",[ContentController::class,'get_assignment']);
    Route::get("getStudyMaterial",[ContentController::class,'get_study_material']);
    Route::get("deleteContent/{id}",[ContentController::class,'delete_content']);
    Route::post("updateContent",[ContentController::class,'update_content']);

});

//TEST
Route::get("test/{studentId}",[PaymentController::class,'get_student_amount']);
Route::get("get_total_discount/{studentId}/{feesTypeId}",[PaymentController::class,'get_total_discount']);

// LOGIN
Route::get("clearPersonalAccessToken",[UserController::class,'delete_personal_access_token']);
Route::post("createUser",[UserController::class,'create_user']);

//SUBJECT GROUP
Route::get("getSubjectGroup",[SubjectGroupController::class,'get_subject_group']);
Route::post("saveSubjectGroup",[SubjectGroupController::class,'save_subject_group']);
Route::post("updateSubjectGroup",[SubjectGroupController::class,'update_subject_group']);
Route::get("deleteSubjectGroup/{course_id?}",[SubjectGroupController::class,'delete_subject_group']);
Route::get("getSubjectGroup/{course_id?}/{semester_id?}",[SubjectGroupController::class,'get_subject_group_by_course_semester']);
Route::get("getSubject/{course_id?}/{semester_id?}",[SubjectGroupController::class,'get_subjects']);


// ASSIGN SEMESTER TEACHER
Route::get("getAssignedSemesterTeacher",[AssignSemesterTeacherController::class,'get_assigned_semester_teacher']);
Route::post("saveSemesterTeacher",[AssignSemesterTeacherController::class,'save_semester_teacher']);
Route::post("updateSemesterTeacher",[AssignSemesterTeacherController::class,'update_semester_teacher']);
Route::get("getTeachersAssign/{course_id?}/{semester_id?}",[AssignSemesterTeacherController::class,'get_teachers']);
Route::get("deleteTeachersAssign/{course_id?}/{semester_id?}",[AssignSemesterTeacherController::class,'delete_assigned_semester_teacher']);



// ATTENDANCE SAVE
Route::post("saveAttendance",[AttendanceController::class,'save_attendance']);
Route::get("getStaffAttendance/{user_type_id}/{date}",[StaffAttendanceController::class,'get_staff_attendance']);
Route::post("saveStaffAttendance",[StaffAttendanceController::class,'save_attendance']);
Route::get("getStudentAttendance/{course_id}/{semester_id}/{date}/{subject_id}",[AttendanceController::class,'get_student_attendance']);
Route::get("getStudentOwnAttendance/{course_id}/{semester_id}/{date}/{user_id}",[AttendanceController::class,'get_student_attendance_own']);

//SEMESTER TIME TABLE
Route::post("saveSemesterTimeTable",[SemesterTimetableController::class,'save_semester_timetable']);
Route::get("getSemesterTimeTable",[SemesterTimetableController::class,'get_semester_timetable']);
Route::post("updateSemesterTimeTable",[SemesterTimetableController::class,'update_semester_timetable']);
Route::get("deleteSemesterTimeTable/{id}",[SemesterTimetableController::class,'delete_semester_timetable']);
Route::get("getSemesterTimeTableByTeacherId/{teacher_id}",[SemesterTimetableController::class,'get_semester_timetable_by_teacher_id']);
Route::get("getSemesterTimeTableByCourseAndSemesterId/{course_id}/{semester_id}",[SemesterTimetableController::class,'get_semester_timetable_by_courseId_semester_id']);



Route::get("getDueFees/{id}",[FeesTypeController::class,'get_due_fees']);

//WEEK DAYS
Route::get("getWeekdays",[WeekDaysController::class,'get_week_days']);
Route::post("saveWeekdays",[WeekDaysController::class,'save_week_days']);
Route::post("updateWeekdays",[WeekDaysController::class,'update_week_days']);
Route::get("deleteWeekdays/{id}",[WeekDaysController::class,'delete_week_days']);


//CATEGORY
Route::get("getCategory",[CategoryController::class,'get_category']);
Route::post("saveCategory",[CategoryController::class,'save_category']);
Route::post("updateCategory",[CategoryController::class,'update_category']);
Route::get("deleteCategory/{id}",[CategoryController::class,'delete_category']);

//GET SEMESTER BY COURSE
Route::get("getSemesterByCourse/{id}",[SemesterController::class,'semester_by_course']);


//STUDENT TOTAL PAID
Route::get("studentTotalPaid/{id}",[PaymentController::class,'student_total_paid']);


//COMMUNICATION
Route::post("mailCommunication",[MemberController::class,'mail_communication']);

//UPLOAD FILE
Route::post("uploadFile",[CourseController::class,'upload_file']);




Route::get("tmail",[FeesTypeController::class,'testMail']);






// count(json_decode($data->semester_by_course(3)->content(),true)['data']); semester controller


