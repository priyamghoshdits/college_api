<?php

use App\Http\Controllers\AchivementController;
use App\Http\Controllers\AdmissionEnquiryController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AgentPaymentController;
use App\Http\Controllers\AnswerscriptEvaluatorController;
use App\Http\Controllers\AnswersheetController;
use App\Http\Controllers\ApiScoreController;
use App\Http\Controllers\AssignSemesterTeacherController;
use App\Http\Controllers\AssignVehicleController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BookPublicationController;
use App\Http\Controllers\CallLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CertificateTypesController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CompanyDetailController;
use App\Http\Controllers\ConsultancyController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EducationQualificationController;
use App\Http\Controllers\ErpSettingsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExaminerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseHeadController;
use App\Http\Controllers\FeesStructureController;
use App\Http\Controllers\FeesTypeController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\GeneratedPayrollController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelDetailsController;
use App\Http\Controllers\HotelTypeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\IncomeHeadController;
use App\Http\Controllers\InternshipDetailsController;
use App\Http\Controllers\InternshipProviderController;
use App\Http\Controllers\InventoryIssueController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\ItemStockController;
use App\Http\Controllers\ItemStoreController;
use App\Http\Controllers\ItemSupplierController;
use App\Http\Controllers\ItemTypesController;
use App\Http\Controllers\JournalPublicationController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveListController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LibraryDigitalBookController;
use App\Http\Controllers\LibraryIssueController;
use App\Http\Controllers\LibraryStockController;
use App\Http\Controllers\ManualFeesController;
use App\Http\Controllers\ManualScholarshipController;
use App\Http\Controllers\MarksheetController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MenuManagementController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PaperPosterController;
use App\Http\Controllers\PaperSetterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayrollTypesController;
use App\Http\Controllers\PgPhdGuideController;
use App\Http\Controllers\PlacementDetailsController;
use App\Http\Controllers\PostalController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RolesAndPermissionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SemesterTimetableController;
use App\Http\Controllers\SeminarWorkshopFacultyController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StaffAttendanceController;
use App\Http\Controllers\StaffEducationController;
use App\Http\Controllers\StaffExperienceController;
use App\Http\Controllers\StudentDetailController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectDetailsController;
use App\Http\Controllers\SubjectGroupController;
use App\Http\Controllers\SynopsisController;
use App\Http\Controllers\ThesisTypeController;
use App\Http\Controllers\UniversitySynopsisController;
use App\Http\Controllers\UniversityThesisController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLogController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VirtualClassController;
use App\Http\Controllers\VirtualMeetingController;
use App\Http\Controllers\VisitorBookController;
use App\Http\Controllers\WeekDaysController;
use App\Http\Controllers\StudentResultController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppVersionController;
use App\Http\Controllers\ClinicalTrainingController;
use App\Http\Controllers\ScholarshipMasterController;
use App\Http\Controllers\MouController;
use App\Http\Controllers\InvigilatorController;
use App\Http\Controllers\OtherAcademicsController;
use App\Http\Controllers\PatentController;
use App\Http\Controllers\UniversityAdjudicatorSynopsisController;
use App\Http\Controllers\UniversityAdjudicatorThesisController;
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
Route::post("login", [UserController::class, 'login'])->name('login');
Route::get("forgotPassword/{email_id}", [UserController::class, 'forgot_password']);

Route::get("initilialize", [RolesAndPermissionController::class, 'initilialize']);
Route::get("clearCache", [RolesAndPermissionController::class, 'clear_cache']);

Route::post("appUpdateChecker", [AppVersionController::class, 'check_app_version']);


Route::get("testF", [MemberController::class, 'testUser']);
Route::get("testFile", [MemberController::class, 'testFile']);

Route::post("getMarksheet", [MarksheetController::class, 'get_mark_sheet']);

Route::get("getErpSettings", [ErpSettingsController::class, 'get_erp_settings']);
Route::post("updateErpSettings", [ErpSettingsController::class, 'update_erp_settings']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    //LOGOUT
    Route::get("logout", [UserController::class, 'logout']);

    //AllUser
    Route::get("getAllUsers", [UserController::class, 'get_all_user']);

    //ERP SETTINGS


    //DASHBOARD
    Route::get("dashboard", [DashboardController::class, 'dashboard']);
    Route::get("dashboardForStudent", [DashboardController::class, 'dashboard_for_student']);

    //SEND STUDENT LOGIN CREDENTIALS
    Route::get("sendLoginCredentials/{id}", [UserController::class, 'send_login_credentials']);

    //GET USER LOGS
    Route::get("getUserLogs", [UserLogController::class, 'get_user_log']);
    Route::get("deleteUserLogs", [UserLogController::class, 'delete_user_log']);

    //REFUND PRE ADMISSION PAYMENT
    Route::get("refundPayment/{id}", [StudentDetailController::class, 'refund_student']);

    //GET LOGGED IN USER DATA
    Route::get("getLoggedInUserData", [UserController::class, 'get_user_data']);
    Route::get("getTotalUserAttendance", [UserController::class, 'get_user_attendance']);

    //MARKSHEET
    Route::post("saveMarksheet", [MarksheetController::class, 'save_mark_sheet']);
    //    Route::get("getMarksheet",[MarksheetController::class,'get_mark_sheet']);

    //HOLIDAY
    Route::post("saveHolidayForWholeYear", [HolidayController::class, 'holiday_for_whole_year']);
    Route::post("saveHoliday", [HolidayController::class, 'save_holiday']);
    Route::get("getHolidayByMonth/{month}", [HolidayController::class, 'get_holiday_list_by_month']);
    Route::post("updateHoliday", [HolidayController::class, 'update_holiday']);
    Route::get("deleteHoliday/{id}", [HolidayController::class, 'delete_holiday']);

    //RESET PASSWORD
    Route::post("resetPassword", [UserController::class, 'reset_password']);

    //VALIDATE STUDENT AND STAFF ID
    Route::get("checkId/{id}", [MemberController::class, 'check_id']);

    // GET ROLES AND PERMISSION
    Route::get("getRolesAndPermission", [RolesController::class, 'get_roles_and_permission']);
    Route::get("getRolesAndPermissionForUpdate", [RolesController::class, 'get_roles_and_permission_for_update']);
    Route::get("updateRoleAndPermissions/{id}", [RolesController::class, 'update_role_and_permissions']);

    //UPLOAD USER PROFILE PICTURE
    Route::post("uploadProfilePicSelf", [MemberController::class, 'upload_profile_picture']);

    //MENU MANAGEMENT
    Route::get("getMenuManagement", [MenuManagementController::class, 'get_menu_management']);
    Route::get("getMenuForUpdate", [MenuManagementController::class, 'get_menu_for_update']);
    Route::get("updateMenuManagement/{id}", [MenuManagementController::class, 'active_deactivate_menu']);

    //SYNOPSYS TYPE
    Route::get("getSynopsis", [SynopsisController::class, 'get_synopsis']);
    Route::post("saveSynopsis", [SynopsisController::class, 'save_synopsis']);
    Route::post("updateSynopsis", [SynopsisController::class, 'update_synopsis']);
    Route::get("deleteSynopsis/{id}", [SynopsisController::class, 'delete_synopsis']);

    //THESIS TYPE
    Route::get("getThesisType", [ThesisTypeController::class, 'get_thesis_type']);
    Route::post("saveThesisType", [ThesisTypeController::class, 'save_thesis']);
    Route::post("updateThesisType", [ThesisTypeController::class, 'update_thesis_type']);
    Route::get("deleteThesisType/{id}", [ThesisTypeController::class, 'delete_thesis_type']);

    // STUDENT
    Route::post("saveStudent", [UserController::class, 'save_student']);
    Route::post("updateStudent", [UserController::class, 'update_student']);
    Route::get("deleteMember/{id}", [MemberController::class, 'delete_member']);
    Route::get("memberStatus/{id}", [MemberController::class, 'member_status']);
    Route::post("saveMember", [UserController::class, 'save_member']);
    Route::post("updateMember", [UserController::class, 'update_member']);
    Route::post("updateMemberOwn", [UserController::class, 'update_member_own']);
    Route::post("updateMemberOwnEducation", [UserController::class, 'update_student_own_education']);
    Route::post("saveStudentManualFees", [UserController::class, 'save_student_manual_fees']);

    //LIBRARY
    Route::get("getLibraryDetails", [LibraryStockController::class, 'get_library_details']);
    Route::post("saveLibraryDetails", [LibraryStockController::class, 'save_library_details']);
    Route::post("updateLibraryDetails", [LibraryStockController::class, 'update_library_details']);
    Route::get("deleteLibraryDetails/{id}", [LibraryStockController::class, 'delete_library_details']);

    // EVENT
    Route::get("getEvent", [EventController::class, 'get_event']);
    Route::post("saveEvent", [EventController::class, 'save_event']);
    Route::post("updateEvent", [EventController::class, 'update_event']);
    Route::get("deleteEvent/{id}", [EventController::class, 'delete_event']);


    // CLINICAL TRAINING
    Route::get("getClinicalTraning", [ClinicalTrainingController::class, 'get_clinical_traning']);
    Route::post("saveClinicalTraning", [ClinicalTrainingController::class, 'save_clinical_traning']);
    Route::post("updateClinicalTraning", [ClinicalTrainingController::class, 'update_clinical_traning']);
    Route::get("deleteClinicalTraning/{id}", [ClinicalTrainingController::class, 'delete_clinical_traning']);


    //EDUCATION QUALIFICATION
    Route::get("searchEducationQualification/{student_id}", [EducationQualificationController::class, 'search_education_qualification']);
    Route::post("saveEducationQualification", [EducationQualificationController::class, 'save_education_qualification']);
    Route::post("updateEducationQualification", [EducationQualificationController::class, 'update_education_qualification']);
    Route::get("deleteEducationQualification/{id}", [EducationQualificationController::class, 'delete_education_qualification']);

    //LIBRARY DIGITAL BOOKS
    Route::get("getLibraryDigitalBook", [LibraryDigitalBookController::class, 'get_digital_library_books']);
    Route::post("saveLibraryDigitalBook", [LibraryDigitalBookController::class, 'save_digital_library_books']);
    Route::post("updateLibraryDigitalBook", [LibraryDigitalBookController::class, 'update_digital_library_books']);
    Route::get("deleteLibraryDigitalBook/{id}", [LibraryDigitalBookController::class, 'delete_digital_library_books']);

    //LIBRARY ISSUE
    Route::get("getIssuedBooks", [LibraryIssueController::class, 'get_issued_books']);
    Route::post("saveIssuedBooks", [LibraryIssueController::class, 'save_issue_books']);
    Route::post("updateIssuedBooks", [LibraryIssueController::class, 'update_issue_books']);
    Route::post("updateIssuedBooksDiscount", [LibraryIssueController::class, 'update_issue_books_discount']);
    Route::get("deleteIssuedBooks/{id}", [LibraryIssueController::class, 'delete_issue_books']);
    Route::get("updateReturnStatus/{id}", [LibraryIssueController::class, 'update_return_status']);
    Route::get("getReturnOverPeriod", [LibraryIssueController::class, 'return_over_period']);

    //GET HOTEL TYPES
    Route::get("getHostelTypes", [HotelTypeController::class, 'get_hotel_type']);

    //HOSTEL
    Route::get("getHostels", [HotelController::class, 'get_hostels']);
    Route::post("saveHostels", [HotelController::class, 'save_hostels']);
    Route::post("updateHostels", [HotelController::class, 'update_hostels']);
    Route::get("deleteHostels/{id}", [HotelController::class, 'delete_hostels']);

    //ASSIGN VEHICLE
    Route::get("getAssignVehicle", [AssignVehicleController::class, 'get_assign_vehicle']);
    Route::post("saveAssignVehicle", [AssignVehicleController::class, 'save_assign_vehicle']);
    Route::post("updateAssignVehicle", [AssignVehicleController::class, 'update_assign_vehicle']);
    Route::get("deleteAssignVehicle/{route_id}", [AssignVehicleController::class, 'delete_assign_vehicle']);

    //ROOM TYPE
    Route::get("getRoomType", [RoomTypeController::class, 'get_room_type']);
    Route::post("saveRoomType", [RoomTypeController::class, 'save_room_type']);
    Route::post("updateRoomType", [RoomTypeController::class, 'update_room_type']);
    Route::get("deleteRoomType/{id}", [RoomTypeController::class, 'delete_room_type']);

    //HOSTEL DETAILS
    Route::get("getRoomDetails", [HotelDetailsController::class, 'get_room_details']);
    Route::post("saveRoomDetails", [HotelDetailsController::class, 'save_room_details']);
    Route::post("updateRoomDetails", [HotelDetailsController::class, 'update_room_details']);
    Route::get("deleteRoomDetails/{id}", [HotelDetailsController::class, 'delete_room_details']);

    //SEMESTER
    Route::get("getSemester", [SemesterController::class, 'get_semester']);
    Route::post("saveSemester", [SemesterController::class, 'save_semester']);
    Route::post("updateSemester", [SemesterController::class, 'update_semester']);
    Route::get("deleteSemester/{id}", [SemesterController::class, 'delete_semester']);

    //INVENTORY ITEM CATEGORY
    Route::get("getItemCategory", [ItemTypesController::class, 'get_item_category']);
    Route::post("saveItemCategory", [ItemTypesController::class, 'save_item_category']);
    Route::post("updateItemCategory", [ItemTypesController::class, 'update_item_category']);
    Route::get("deleteItemCategory/{id}", [ItemTypesController::class, 'delete_item_category']);

    //SUBJECT
    Route::get("getSubject", [SubjectController::class, 'get_subject']);
    Route::post("saveSubject", [SubjectController::class, 'save_subject']);
    Route::post("updateSubject", [SubjectController::class, 'update_subject']);
    Route::get("deleteSubject/{id}", [SubjectController::class, 'delete_subject']);

    //INVENTORY ITEM
    Route::get("getInventoryItems", [InventoryItemController::class, 'get_inventory_items']);
    Route::get("getInventoryItemsByCategory/{category_id}", [InventoryItemController::class, 'get_inventory_items_by_category']);
    Route::post("saveInventoryItems", [InventoryItemController::class, 'save_inventory_items']);
    Route::post("updateInventoryItems", [InventoryItemController::class, 'update_inventory_items']);
    Route::get("deleteInventoryItems/{id}", [InventoryItemController::class, 'delete_inventory_items']);

    //UPLOAD PROFILE IMAGE
    Route::post("uploadProfilePic", [MemberController::class, 'upload_file']);
    Route::post("promoteStudents", [MemberController::class, 'promote_students']);

    //GENERATED PAYROLL
    Route::post("savePayroll", [GeneratedPayrollController::class, 'save_payroll']);
    Route::post("saveProceedToPay", [GeneratedPayrollController::class, 'save_proceed_to_pay']);
    Route::get("revertToProceedToPay/{id}", [GeneratedPayrollController::class, 'revert_proceed_to_pay']);
    Route::get("revertToGenerate/{id}", [GeneratedPayrollController::class, 'revert_generate']);

    // GET ALL MEMBERS
    Route::get("getAllMembers", [MemberController::class, 'get_all_members']);
    Route::get("getMembers/{user_type_id}/{month}/{year}", [MemberController::class, 'get_members_by_user_type_id']);
    Route::get("getTeachers", [MemberController::class, 'get_teachers']);
    Route::get("getStudents/{session_id}", [MemberController::class, 'get_students']);
    Route::get("getStudentFullDetails/{id}", [MemberController::class, 'get_student_full_details']);
    Route::get("getMemberFullDetails/{id}", [MemberController::class, 'get_member_full_details']);
    Route::post("getStudentsForCautionMoney", [MemberController::class, 'get_students_for_caution_money']);
    Route::post("refundCationMoney", [MemberController::class, 'refund_caution_money']);
    Route::get("revertCautionMoney/{user_id}", [MemberController::class, 'revert_caution_money']);
    Route::post("getStudentsBySession", [MemberController::class, 'get_students_by_session']);
    Route::get("changeStudentStatus/{id}", [MemberController::class, 'change_student_status']);
    Route::get("getTeacherByCourseAndSem/{course_id}/{semester_id}", [MemberController::class, 'get_teacher_by_course_and_semester']);

    //INTERNSHIP PROVIDER
    Route::get("getInternshipProvider", [InternshipProviderController::class, 'get_internship_providers']);
    Route::post("saveInternshipProvider", [InternshipProviderController::class, 'save_internship_provider']);
    Route::post("updateInternshipProvider", [InternshipProviderController::class, 'update_internship_provider']);
    Route::get("deleteInternshipProvider/{id}", [InternshipProviderController::class, 'delete_internship_provider']);

    //INTERNSHIP DETAILS
    Route::get("getInternshipDetails", [InternshipDetailsController::class, 'get_internship_details']);
    Route::post("saveInternshipDetails", [InternshipDetailsController::class, 'save_internship_details']);
    Route::post("updateInternshipDetails", [InternshipDetailsController::class, 'update_internship_details']);
    Route::get("deleteInternshipDetails/{id}", [InternshipDetailsController::class, 'delete_internship_details']);

    //SESSION
    Route::get("getSession", [SessionController::class, 'get_session']);
    Route::post("saveSession", [SessionController::class, 'save_session']);
    Route::post("updateSession", [SessionController::class, 'update_session']);
    Route::get("deleteSession/{id}", [SessionController::class, 'delete_session']);

    //MANUAL FEES
    Route::post("searchManualFees", [ManualFeesController::class, 'search_manual_fees']);
    Route::post("saveManualFees", [ManualFeesController::class, 'save_manual_fees']);
    //    Route::post("updateSession", [ManualFeesController::class, 'update_session']);
    Route::get("deleteManualFees/{id}", [ManualFeesController::class, 'delete_manual_fees']);

    //ROUTES
    Route::get("getRoutes", [RoutesController::class, 'get_routes']);
    Route::post("saveRoutes", [RoutesController::class, 'save_routes']);
    Route::post("updateRoutes", [RoutesController::class, 'update_routes']);
    Route::get("deleteRoutes/{id}", [RoutesController::class, 'delete_routes']);

    //VEHICLE
    Route::get("getVehicle", [VehicleController::class, 'get_vehicle']);
    Route::post("saveVehicle", [VehicleController::class, 'save_vehicle']);
    Route::post("updateVehicle", [VehicleController::class, 'update_vehicle']);
    Route::get("deleteVehicle/{id}", [VehicleController::class, 'delete_vehicle']);

    //LEAVE TYPE
    Route::get("getLeaveType", [LeaveTypeController::class, 'get_leave_type']);
    Route::post("saveLeaveType", [LeaveTypeController::class, 'save_leave_type']);
    Route::post("updateLeaveType", [LeaveTypeController::class, 'update_leave_type']);
    Route::get("deleteLeaveType/{id}", [LeaveTypeController::class, 'delete_leave_type']);

    //LEAVE LIST
    Route::get("getLeaveList", [LeaveListController::class, 'get_leave_list']);
    Route::post("saveLeaveList", [LeaveListController::class, 'save_leave_list']);
    Route::post("updateLeaveList", [LeaveListController::class, 'update_leave_list']);
    Route::get("deleteLeaveList/{id}", [LeaveListController::class, 'delete_leave_list']);

    //LEAVE
    Route::get("getLeavesBy/{user_id}/{leave_type_id}", [LeaveController::class, 'get_leave_by_userId_and_leaveTypeId']);
    Route::post("saveLeave", [LeaveController::class, 'save_leave']);
    Route::get("getLeave", [LeaveController::class, 'get_leave_details']);
    Route::get("deleteLeave/{id}", [LeaveController::class, 'delete_leave']);
    Route::post("updateLeave", [LeaveController::class, 'update_leave']);
    Route::get("updateApproval/{id}/{status}", [LeaveController::class, 'update_approval']);

    //COURSE
    Route::get("getCourse", [CourseController::class, 'get_course']);
    Route::post("saveCourse", [CourseController::class, 'save_course']);
    Route::post("updateCourse", [CourseController::class, 'update_course']);
    Route::get("deleteCourse/{id?}", [CourseController::class, 'delete_course']);

    //NOTICES
    Route::get("getNotices", [NoticeController::class, 'get_notices']);
    Route::post("saveNotices", [NoticeController::class, 'save_notices']);
    Route::post("updateNotices", [NoticeController::class, 'update_notices']);
    Route::get("deleteNotice/{id}", [NoticeController::class, 'delete_notices']);

    //USER TYPE
    Route::get("getUserTypes", [UserTypeController::class, 'get_user_types']);
    Route::get("getUserByUserTypes/{user_type_id}", [UserTypeController::class, 'get_user_by_user_type_id']);
    Route::post("saveUserTypes", [UserTypeController::class, 'save_user_type']);
    Route::post("updateUserTypes", [UserTypeController::class, 'update_user_type']);
    Route::get("deleteUserTypes/{id}", [UserTypeController::class, 'delete_user_type']);

    //SUBJECT DETAILS
    Route::get("getSubjectDetails", [SubjectDetailsController::class, 'get_subject_details']);
    Route::post("saveSubjectDetails", [SubjectDetailsController::class, 'save_subject_details']);
    Route::post("updateSubjectDetails", [SubjectDetailsController::class, 'update_subject_details']);
    Route::get("deleteSubjectDetails/{id?}", [SubjectDetailsController::class, 'delete_subject_details']);

    //QUESTIONS
    Route::get("getQuestions", [QuestionController::class, 'get_questions']);
    Route::post("saveQuestions", [QuestionController::class, 'save_questions']);
    Route::post("updateQuestions", [QuestionController::class, 'update_questions']);
    Route::get("updateStatus/{id}", [QuestionController::class, 'updateStatus']);
    Route::post("deleteQuestion", [QuestionController::class, 'delete_questions']);
    //    Route::get("deleteSubjectDetails/{id?}",[QuestionController::class,'delete_subject_details']);

    //PAPER SETTER
    Route::post("savePaperSetter", [PaperSetterController::class, 'save_PaperSetter']);
    Route::post("saveUploadFilePaperSetter", [PaperSetterController::class, 'save_upload_file']);
    Route::post("updatePaperSetter", [PaperSetterController::class, 'update_PaperSetter']);
    Route::get("deletePaperSetter/{id}", [PaperSetterController::class, 'delete_PaperSetter']);
    Route::post("searchPaperSetting", [PaperSetterController::class, 'search_paper_setting']);

    //PAPER POSTER
    Route::post("savePaperPoster", [PaperPosterController::class, 'save_paper_poster']);
    Route::post("saveUploadFilePaperPoster", [PaperPosterController::class, 'save_upload_file']);
    Route::post("updatePaperPoster", [PaperPosterController::class, 'update_paper_poster']);
    Route::get("deletePaperPoster/{id}", [PaperPosterController::class, 'delete_paper_poster']);
    Route::post("searchPaperPoster", [PaperPosterController::class, 'search_paper_setting']);

    //API SCORE
    Route::post("saveApiScore", [ApiScoreController::class, 'save_api_score']);
    Route::post("saveApiScoreOwn", [ApiScoreController::class, 'save_api_score_own']);
    Route::post("updateApiScore", [ApiScoreController::class, 'update_api_score']);
    Route::get("deleteApiScore/{id}", [ApiScoreController::class, 'delete_api_score']);
    Route::post("saveUploadFileApiScore", [ApiScoreController::class, 'save_upload_file_api_score']);
    Route::post("searchApiScore", [ApiScoreController::class, 'search_api_search']);

    //SEMINAR WORKSHOP FACULTY DEVELOPMENT PROGRAMME
    Route::post("saveSeminarWorkshopFaculty", [SeminarWorkshopFacultyController::class, 'save_seminar_workshop_faculty']);
    Route::post("saveSeminarWorkshopFacultyFile", [SeminarWorkshopFacultyController::class, 'save_seminar_workshop_faculty_file']);
    Route::post("updateSeminarWorkshopFaculty", [SeminarWorkshopFacultyController::class, 'update_seminar_workshop_faculty']);
    Route::get("deleteSeminarWorkshopFaculty/{id}", [SeminarWorkshopFacultyController::class, 'delete_seminar_workshop_faculty']);
    Route::post("searchSeminarWorkshopFaculty", [SeminarWorkshopFacultyController::class, 'search_seminar_workshop_faculty']);


    //ANSWER SCRIPT EVALUATOR
    Route::post("saveAnswerScriptEvaluator", [AnswerscriptEvaluatorController::class, 'save_answer_script_evaluator']);
    Route::post("saveUploadFile", [AnswerscriptEvaluatorController::class, 'save_upload_file_ans_evaluator']);
    Route::post("updateAnswerScriptEvaluator", [AnswerscriptEvaluatorController::class, 'update_answer_script_evaluator']);
    Route::get("deleteAnswerScriptEvaluator/{id}", [AnswerscriptEvaluatorController::class, 'delete_answer_script_evaluator']);
    Route::post("searchAnswerScriptEvaluator", [AnswerscriptEvaluatorController::class, 'search_answer_script_evaluator']);

    //EXAMINER
    Route::post("saveExaminer", [ExaminerController::class, 'save_examiner']);
    Route::post("saveUploadFileExaminer", [ExaminerController::class, 'save_upload_file']);
    Route::post("updateExaminer", [ExaminerController::class, 'update_examiner']);
    Route::get("deleteExaminer/{id}", [ExaminerController::class, 'delete_examiner']);
    Route::post("searchExaminer", [ExaminerController::class, 'search_examiner']);

    //PG PHD GUIDE
    Route::get("getPgPhdGuide/{staff_id?}", [PgPhdGuideController::class, 'get_pg_phd_guide']);
    Route::post("savePgPhdGuide", [PgPhdGuideController::class, 'save_pg_phd_guide']);
    Route::post("savePgPhdGuideOwn", [PgPhdGuideController::class, 'save_pg_phd_guide_own']);
    Route::post("saveUploadFilePg", [PgPhdGuideController::class, 'save_upload_file_pg']);
    Route::post("updatePgPhdGuide", [PgPhdGuideController::class, 'update_pg_phd_guide']);
    Route::get("deletePgPhdGuide/{id}", [PgPhdGuideController::class, 'delete_pg_phd_guide']);

    // UNIVERSITY SYNOPSIS
    Route::get("getUniversitySynopsis/{staff_id?}", [UniversitySynopsisController::class, 'get_university_synopsis']);
    Route::post("saveUniversitySynopsis", [UniversitySynopsisController::class, 'save_university_synopsis']);
    Route::post("saveUniversitySynopsisFile", [UniversitySynopsisController::class, 'save_university_synopsis_file']);
    Route::post("updateUniversitySynopsis", [UniversitySynopsisController::class, 'update_university_synopsis']);
    Route::get("deleteUniversitySynopsis/{id}", [UniversitySynopsisController::class, 'delete_university_synopsis']);
    Route::post("saveUniversitySynopsisApp", [UniversitySynopsisController::class, 'save_university_synopsis_app']);

    // STUDENT RESULT
    Route::get("getStudentResult/{student_id?}", [StudentResultController::class, 'get_student_result']);
    Route::post("saveStudentResult", [StudentResultController::class, 'save_student_result']);
    Route::post("saveStudentResultFile", [StudentResultController::class, 'save_student_result_file']);
    Route::post("updateStudentResult", [StudentResultController::class, 'update_student_result']);
    Route::get("deleteStudentResult/{id}", [StudentResultController::class, 'delete_student_result']);
    Route::post("saveStudentResultApp", [StudentResultController::class, 'save_student_result_app']);

    // UNIVERSITY THESIS
    Route::get("getUniversityThesis/{staff_id?}", [UniversityThesisController::class, 'get_university_thesis']);
    Route::post("saveUniversityThesis", [UniversityThesisController::class, 'save_university_thesis']);
    Route::post("saveUniversityThesisFile", [UniversityThesisController::class, 'save_university_thesis_file']);
    Route::post("updateUniversityThesis", [UniversityThesisController::class, 'update_university_thesis']);
    Route::get("deleteUniversityThesis/{id}", [UniversityThesisController::class, 'delete_university_thesis']);
    Route::post("saveUniversityThesisApp", [UniversityThesisController::class, 'save_university_thesis_app']);

    // STAFF EDUCATION
    Route::get("getStaffEducation/{staff_id?}", [StaffEducationController::class, 'get_staff_education']);
    Route::post("saveStaffEducation", [StaffEducationController::class, 'save_staff_education']);
    Route::post("saveStaffEducationOwn", [StaffEducationController::class, 'save_staff_education_own']);
    Route::post("saveStaffEducationFile", [StaffEducationController::class, 'save_staff_education_file']);
    Route::post("updateStaffEducation", [StaffEducationController::class, 'update_staff_education']);
    Route::get("deleteStaffEducation/{id}", [StaffEducationController::class, 'delete_staff_education']);
    Route::post("saveStaffEducationApp", [StaffEducationController::class, 'save_staff_education_app']);

    // MOU
    Route::get("getMou", [MouController::class, 'get_mou']);
    Route::post("saveMou", [MouController::class, 'save_mou']);
    Route::post("saveMouFile", [MouController::class, 'save_mou_file']);
    Route::post("updateMou", [MouController::class, 'update_mou']);
    Route::get("deleteMou/{id}", [MouController::class, 'delete_mou']);
    Route::post("saveMouApp", [MouController::class, 'save_mou_app']);


    // MANUAL SCHOLARSHIP
    Route::post("getManualScholarship", [ManualScholarshipController::class, 'get_manual_scholarship']);
    Route::post("saveManualScholarshipOwn", [ManualScholarshipController::class, 'save_manual_scholarship_own']);
    Route::post("saveManualScholarship", [ManualScholarshipController::class, 'save_manual_scholarship']);
    Route::post("updateManualScholarship", [ManualScholarshipController::class, 'update_manual_scholarship']);
    Route::get("deleteManualScholarship/{id}", [ManualScholarshipController::class, 'delete_manual_scholarship']);
    Route::post("saveManualScholarshipApp", [ManualScholarshipController::class, 'save_manual_scholarship_app']);

    // DEGREE
    Route::get("getDegree", [DegreeController::class, 'get_degree']);
    Route::post("saveDegree", [DegreeController::class, 'save_degree']);
    Route::post("updateDegree", [DegreeController::class, 'update_degree']);
    Route::get("deleteDegree/{id}", [DegreeController::class, 'delete_degree']);

    //PROMOTION
    Route::get("getPromotion", [PromotionController::class, 'get_promotion']);
    Route::post("savePromotion", [PromotionController::class, 'save_promotion']);
    Route::post("updatePromotion", [PromotionController::class, 'update_promotion']);
    Route::get("deletePromotion/{id}", [PromotionController::class, 'delete_promotion']);

    //SCHOLARSHIP MASTER
    Route::get("getScholarship", [ScholarshipMasterController::class, 'get_scholarship']);
    Route::post("saveScholarship", [ScholarshipMasterController::class, 'save_scholarship']);
    Route::post("updateScholarship", [ScholarshipMasterController::class, 'update_scholarship']);
    Route::get("deleteScholarship/{id}", [ScholarshipMasterController::class, 'delete_scholarship']);


    //JOURNAL PUBLICATION
    Route::get("searchJournalPublication/{staff_id?}", [JournalPublicationController::class, 'search_journal_publication']);
    Route::get("getJournalPublication", [JournalPublicationController::class, 'get_journal_Publication']);
    Route::post("saveJournalPublicationFile", [JournalPublicationController::class, 'save_journal_Publication_file']);
    Route::post("saveJournalPublication", [JournalPublicationController::class, 'save_journal_Publication']);
    Route::post("saveJournalPublicationOwn", [JournalPublicationController::class, 'save_journal_Publication_own']);
    Route::post("updateJournalPublication", [JournalPublicationController::class, 'update_journal_Publication']);
    Route::get("deleteJournalPublication/{id}", [JournalPublicationController::class, 'delete_journal_Publication']);

    //CONSULTATION
    Route::get("searchConsultancy/{staff_id}", [ConsultancyController::class, 'search_consultancy']);
    Route::post("saveConsultation", [ConsultancyController::class, 'save_consultation']);
    Route::post("updateConsultation", [ConsultancyController::class, 'update_consultation']);
    Route::get("deleteConsultation/{id}", [ConsultancyController::class, 'delete_consultation']);

    //FEES TYPE
    Route::get("getFeesType", [FeesTypeController::class, 'get_fees_type']);
    Route::post("saveFeesType", [FeesTypeController::class, 'save_fees_type']);
    Route::post("updateFeesType", [FeesTypeController::class, 'update_fees_type']);
    Route::get("deleteFeesType/{id}", [FeesTypeController::class, 'delete_fees_type']);

    //FEES STRUCTURE
    Route::get("getFeesStructure", [FeesStructureController::class, 'get_fees_structure']);
    Route::get("getFeesStructureByCourseId/{course_id}", [FeesStructureController::class, 'get_fees_structure_by_course_id']);
    Route::post("saveFeesStructure", [FeesStructureController::class, 'save_fees_structure']);
    Route::post("updateFeesStructure", [FeesStructureController::class, 'update_fees_structure']);
    Route::post("deleteFeesStructure", [FeesStructureController::class, 'delete_fees_structure']);
    Route::get("getStudentFeesDetails/{id}", [FeesStructureController::class, 'get_student_fees_details']);

    //DISCOUNT
    Route::get("getDiscount", [DiscountController::class, 'get_discount']);
    Route::post("saveDiscount", [DiscountController::class, 'save_discount']);
    Route::post("updateDiscount", [DiscountController::class, 'update_discount']);
    Route::get("deleteDiscount/{id}", [DiscountController::class, 'delete_discount']);

    //EXPERIENCE
    Route::get("getExperience", [StaffExperienceController::class, 'get_experience']);
    Route::post("saveExperience", [StaffExperienceController::class, 'save_experience']);
    Route::post("saveExperienceOwn", [StaffExperienceController::class, 'save_experience_own']);
    Route::post("updateExperience", [StaffExperienceController::class, 'update_experience']);
    Route::get("deleteExperience/{id}", [StaffExperienceController::class, 'delete_experience']);

    //DEPARTMENT
    Route::get("getDepartment", [DepartmentController::class, 'get_department']);
    Route::post("saveDepartment", [DepartmentController::class, 'save_department']);
    Route::post("updateDepartment", [DepartmentController::class, 'update_department']);
    Route::get("deleteDepartment/{id}", [DepartmentController::class, 'delete_department']);

    //DESIGNATION
    Route::get("getDesignation", [DesignationController::class, 'get_designation']);
    Route::post("saveDesignation", [DesignationController::class, 'save_designation']);
    Route::post("updateDesignation", [DesignationController::class, 'update_designation']);
    Route::get("deleteDesignation/{id}", [DesignationController::class, 'delete_designation']);

    //INVIGILATOR
    Route::get("getInvigilator", [InvigilatorController::class, 'get_invigilator']);
    Route::post("saveInvigilator", [InvigilatorController::class, 'save_invigilator']);
    Route::post("updateInvigilator", [InvigilatorController::class, 'update_invigilator']);
    Route::get("deleteInvigilator/{id}", [InvigilatorController::class, 'delete_invigilator']);

    //UNIVERSITY ADJUDICATOR SYNOPSIS
    Route::get("getUniversityAdjudicatorSynopsis", [UniversityAdjudicatorSynopsisController::class, 'get_university_adjudicator']);
    Route::post("saveUniversityAdjudicatorSynopsis", [UniversityAdjudicatorSynopsisController::class, 'save_university_adjudicator']);
    Route::post("updateUniversityAdjudicatorSynopsis", [UniversityAdjudicatorSynopsisController::class, 'update_university_adjudicator']);
    Route::get("deleteUniversityAdjudicatorSynopsis/{id}", [UniversityAdjudicatorSynopsisController::class, 'delete_university_adjudicator']);

    //UNIVERSITY ADJUDICATOR THESIS
    Route::get("getUniversityAdjudicatorThesis", [UniversityAdjudicatorThesisController::class, 'get_university_adjudicator']);
    Route::post("saveUniversityAdjudicatorThesis", [UniversityAdjudicatorThesisController::class, 'save_university_adjudicator']);
    Route::post("updateUniversityAdjudicatorThesis", [UniversityAdjudicatorThesisController::class, 'update_university_adjudicator']);
    Route::get("deleteUniversityAdjudicatorThesis/{id}", [UniversityAdjudicatorThesisController::class, 'delete_university_adjudicator']);

    //PATENT
    Route::get("getPatent", [PatentController::class, 'get_patent']);
    Route::post("savePatent", [PatentController::class, 'save_patent']);
    Route::post("updatePatent", [PatentController::class, 'update_patent']);
    Route::get("deletePatent/{id}", [PatentController::class, 'delete_patent']);

    //OTHER ACADEMICS
    Route::get("getOtherAcademics", [OtherAcademicsController::class, 'get_other_academics']);
    Route::post("saveOtherAcademics", [OtherAcademicsController::class, 'save_other_academics']);
    Route::post("updateOtherAcademics", [OtherAcademicsController::class, 'update_other_academics']);
    Route::get("deleteOtherAcademics/{id}", [OtherAcademicsController::class, 'delete_other_academics']);

    //PAYMENT
    Route::get("getPayment", [PaymentController::class, 'get_payment']);
    Route::post("savePayment", [PaymentController::class, 'save_payment']);
    Route::post("updatePayment", [PaymentController::class, 'update_payment']);
    Route::get("deletePayment/{id}", [PaymentController::class, 'delete_payment']);
    Route::get("getPaymentByStudentID/{id}", [PaymentController::class, 'get_payment_by_studentId']);
    Route::post("uploadFeesReceipt", [PaymentController::class, 'upload_fees_receipt']);

    //AGENT
    Route::get("getAgent", [AgentController::class, 'get_agent']);
    Route::post("saveAgent", [AgentController::class, 'save_agent']);
    Route::post("updateAgent", [AgentController::class, 'update_agent']);
    Route::get("deleteAgent/{id}", [AgentController::class, 'delete_agent']);
    Route::get("getStudentByAgentId/{id}", [AgentController::class, 'get_student_by_agentId']);

    //ANS SHEET
    Route::get("getAnswerSheet", [AnswersheetController::class, 'get_answersheet']);
    Route::post("saveAnswerSheet", [AnswersheetController::class, 'save_answersheet']);

    //GET SEMESTER BY COURSE
    Route::get("getSemesterByCourse/{id}", [SemesterController::class, 'semester_by_course']);

    //Content
    Route::get("getContent", [ContentController::class, 'get_content']);
    Route::post("saveContent", [ContentController::class, 'save_content']);
    Route::get("getAssignment", [ContentController::class, 'get_assignment']);
    Route::get("getStudyMaterial", [ContentController::class, 'get_study_material']);
    Route::get("getSyllabus", [ContentController::class, 'get_syllabus']);
    Route::get("deleteContent/{id}", [ContentController::class, 'delete_content']);
    Route::post("updateContent", [ContentController::class, 'update_content']);

    //SUBJECT GROUP
    Route::get("getSubjectGroup", [SubjectGroupController::class, 'get_subject_group']);
    Route::post("saveSubjectGroup", [SubjectGroupController::class, 'save_subject_group']);
    Route::post("updateSubjectGroup", [SubjectGroupController::class, 'update_subject_group']);
    Route::get("deleteSubjectGroup/{course_id?}/{semester_id?}", [SubjectGroupController::class, 'delete_subject_group']);
    Route::get("getSubjectGroup/{course_id?}/{semester_id?}", [SubjectGroupController::class, 'get_subject_group_by_course_semester']);
    Route::get("getSubject/{course_id?}/{semester_id?}", [SubjectGroupController::class, 'get_subjects']);

    // ATTENDANCE SAVE
    Route::post("saveAttendance", [AttendanceController::class, 'save_attendance']);
    Route::get("getClass/{subject_id}/{date?}", [AttendanceController::class, 'get_class']);
    Route::get("getStaffAttendance/{user_type_id}/{date}", [StaffAttendanceController::class, 'get_staff_attendance']);
    Route::post("saveStaffAttendance", [StaffAttendanceController::class, 'save_attendance']);
    Route::get("getStudentAttendance/{course_id}/{semester_id}/{date}/{subject_id}/{session_id}/{class}", [AttendanceController::class, 'get_student_attendance']);
    Route::get("getStudentOwnAttendance/{course_id}/{semester_id}/{date}/{user_id}/{member_id}", [AttendanceController::class, 'get_student_attendance_own']);
    Route::get("updateClassStart/{id}/{latitude}/{longitude}", [AttendanceController::class, 'update_class_start']);
    Route::get("updateClassEnd/{id}/{latitude}/{longitude}", [AttendanceController::class, 'update_class_end']);
    Route::get("getStaffForPayslip/{course_id}/{month}/{year}", [MemberController::class, 'get_staff_for_payslips']);
    Route::post("uploadPayslips", [MemberController::class, 'upload_payslip']);


    //FRANCHISE
    Route::get("getFranchise", [FranchiseController::class, 'get_franchise']);
    Route::post("saveFranchise", [FranchiseController::class, 'save_franchise']);
    Route::post("updateFranchise", [FranchiseController::class, 'update_franchise']);
    Route::get("deleteFranchise/{id}", [FranchiseController::class, 'delete_franchise']);

    //PAYROLL TYPES
    Route::get("getPayrollTypes", [PayrollTypesController::class, 'get_payroll_types']);
    Route::post("savePayrollTypes", [PayrollTypesController::class, 'save_payroll_types']);
    Route::post("updatePayrollTypes", [PayrollTypesController::class, 'update_payroll_types']);
    Route::get("deletePayrollTypes/{id}", [PayrollTypesController::class, 'delete_payroll_types']);

    //ITEM SUPPLIER
    Route::get("getItemSupplier", [ItemSupplierController::class, 'get_item_supplier']);
    Route::post("saveItemSupplier", [ItemSupplierController::class, 'save_item_supplier']);
    Route::post("updateItemSupplier", [ItemSupplierController::class, 'update_item_supplier']);
    Route::get("deleteItemSupplier/{id}", [ItemSupplierController::class, 'delete_item_supplier']);

    //ITEM STORE
    Route::get("getItemStore", [ItemStoreController::class, 'get_item_store']);
    Route::post("saveItemStore", [ItemStoreController::class, 'save_item_store']);
    Route::post("updateItemStore", [ItemStoreController::class, 'update_item_store']);
    Route::get("deleteItemStore/{id}", [ItemStoreController::class, 'delete_item_store']);

    //WEEK DAYS
    Route::get("getWeekdays", [WeekDaysController::class, 'get_week_days']);
    Route::post("saveWeekdays", [WeekDaysController::class, 'save_week_days']);
    Route::post("updateWeekdays", [WeekDaysController::class, 'update_week_days']);
    Route::get("deleteWeekdays/{id}", [WeekDaysController::class, 'delete_week_days']);

    //CATEGORY
    Route::get("getCategory", [CategoryController::class, 'get_category']);
    Route::post("saveCategory", [CategoryController::class, 'save_category']);
    Route::post("updateCategory", [CategoryController::class, 'update_category']);
    Route::get("deleteCategory/{id}", [CategoryController::class, 'delete_category']);

    // ASSIGN SEMESTER TEACHER
    Route::get("getAssignedSemesterTeacher", [AssignSemesterTeacherController::class, 'get_assigned_semester_teacher']);
    Route::post("saveSemesterTeacher", [AssignSemesterTeacherController::class, 'save_semester_teacher']);
    Route::post("updateSemesterTeacher", [AssignSemesterTeacherController::class, 'update_semester_teacher']);
    Route::get("getTeachersAssign/{course_id?}/{semester_id?}", [AssignSemesterTeacherController::class, 'get_teachers']);
    Route::get("deleteTeachersAssign/{course_id?}/{semester_id?}", [AssignSemesterTeacherController::class, 'delete_assigned_semester_teacher']);

    //SEMESTER TIME TABLE
    Route::post("saveSemesterTimeTable", [SemesterTimetableController::class, 'save_semester_timetable']);
    Route::get("getSemesterTimeTable", [SemesterTimetableController::class, 'get_semester_timetable']);
    Route::post("updateSemesterTimeTable", [SemesterTimetableController::class, 'update_semester_timetable']);
    Route::get("deleteSemesterTimeTable/{id}", [SemesterTimetableController::class, 'delete_semester_timetable']);
    Route::get("getSemesterTimeTableByTeacherId/{teacher_id}", [SemesterTimetableController::class, 'get_semester_timetable_by_teacher_id']);
    Route::get("getSemesterTimeTableByCourseAndSemesterId/{course_id}/{semester_id}/{session_id}", [SemesterTimetableController::class, 'get_semester_timetable_by_courseId_semester_id']);

    //ITEM STOCK
    Route::get("getItemStock", [ItemStockController::class, 'get_item_stock']);
    Route::post("saveItemStock", [ItemStockController::class, 'save_item_stock']);
    Route::post("updateItemStock", [ItemStockController::class, 'update_item_stock']);
    Route::get("deleteItemStock/{id}", [ItemStockController::class, 'delete_item_stock']);
    Route::get("getQuantityByItemId/{item_id}", [ItemStockController::class, 'get_quantity_by_item_id']);

    //ITEM ISSUE
    Route::get("getIssueItem", [InventoryIssueController::class, 'get_issue_item']);
    Route::post("saveIssueItem", [InventoryIssueController::class, 'save_issue_item']);
    Route::post("updateIssueItem", [InventoryIssueController::class, 'update_issue_item']);
    Route::get("deleteIssueItem/{id}", [InventoryIssueController::class, 'delete_issue_item']);
    Route::get("updateStatusInventoryIssue/{id}", [InventoryIssueController::class, 'update_status']);

    //INCOME HEAD API
    Route::get("getIncomeHead", [IncomeHeadController::class, 'get_income_head']);
    Route::post("saveIncomeHead", [IncomeHeadController::class, 'save_income_head']);
    Route::post("updateIncomeHead", [IncomeHeadController::class, 'update_income_head']);
    Route::get("deleteIncomeHead/{id?}", [IncomeHeadController::class, 'delete_income_head']);

    //EXPENSE HEAD API
    Route::get("getExpenseHead", [ExpenseHeadController::class, 'get_expense_head']);
    Route::post("saveExpenseHead", [ExpenseHeadController::class, 'save_expense_head']);
    Route::post("updateExpenseHead", [ExpenseHeadController::class, 'update_expense_head']);
    Route::get("deleteExpenseHead/{id?}", [ExpenseHeadController::class, 'delete_expense_head']);

    //INCOME API
    Route::get("getIncome", [IncomeController::class, 'get_income']);
    Route::post("saveIncome", [IncomeController::class, 'save_income']);
    Route::post("updateIncome", [IncomeController::class, 'update_income']);
    Route::get("deleteIncome/{id?}", [IncomeController::class, 'delete_income']);

    //COMPANY DETAILS
    Route::get("getCompanyDetails", [CompanyDetailController::class, 'get_company_details']);
    Route::post("saveCompanyDetails", [CompanyDetailController::class, 'save_company_details']);
    Route::post("updateCompanyDetails", [CompanyDetailController::class, 'update_company_details']);
    Route::get("deleteCompanyDetails/{id?}", [CompanyDetailController::class, 'delete_company_details']);

    //PLACEMENT DETAILS
    Route::get("getPlacementDetails", [PlacementDetailsController::class, 'get_placement_details']);
    Route::post("savePlacementDetails", [PlacementDetailsController::class, 'save_placement_details']);
    Route::post("updatePlacementDetails", [PlacementDetailsController::class, 'update_placement_details']);
    Route::get("deletePlacementDetails/{id?}", [PlacementDetailsController::class, 'delete_placement_details']);

    // OWN PLACEMENT DETAILS
    Route::get("getOwnPlacementDetails", [PlacementDetailsController::class, 'get_own_placement_details']);
    Route::post("saveOwnPlacementDetails", [PlacementDetailsController::class, 'save_own_placement_details']);
    Route::post("updateOwnPlacementDetails", [PlacementDetailsController::class, 'update_own_placement_details']);

    //EXPENSE API
    Route::get("getExpense", [ExpenseController::class, 'get_expense']);
    Route::post("saveExpense", [ExpenseController::class, 'save_expense']);
    Route::post("updateExpense", [ExpenseController::class, 'update_expense']);
    Route::get("deleteExpense/{id?}", [ExpenseController::class, 'delete_expense']);

    //CERTIFICATE TYPE
    Route::get("getCertificateType", [CertificateTypesController::class, 'get_certificate_types']);
    Route::post("saveCertificateType", [CertificateTypesController::class, 'save_certificate_types']);
    Route::post("updateCertificateType", [CertificateTypesController::class, 'update_certificate_types']);
    Route::get("deleteCertificateType/{id?}", [CertificateTypesController::class, 'delete_certificate_types']);

    //VIRTUAL CLASS
    Route::get("getVirtualClass", [VirtualClassController::class, 'get_virtual_class']);
    Route::post("saveVirtualClass", [VirtualClassController::class, 'save_virtual_class']);
    Route::post("updateVirtualClass", [VirtualClassController::class, 'update_virtual_class']);
    Route::get("deleteVirtualClass/{id?}", [VirtualClassController::class, 'delete_virtual_class']);

    //VIRTUAL MEETING
    Route::get("getVirtualMeeting", [VirtualMeetingController::class, 'get_virtual_meeting']);
    Route::post("saveVirtualMeeting", [VirtualMeetingController::class, 'save_virtual_meeting']);
    Route::post("updateVirtualMeeting", [VirtualMeetingController::class, 'update_virtual_meeting']);
    Route::get("deleteVirtualMeeting/{id?}", [VirtualMeetingController::class, 'delete_virtual_meeting']);

    //VISITOR BOOK
    Route::get("getVisitorBook", [VisitorBookController::class, 'get_visitor']);
    Route::post("saveVisitorBook", [VisitorBookController::class, 'save_visitor_book']);
    Route::post("updateVisitorBook", [VisitorBookController::class, 'update_visitor_book']);
    Route::get("deleteVisitorBook/{id?}", [VisitorBookController::class, 'delete_visitor_book']);

    //HOMEWORK
    Route::get("getHomework", [HomeworkController::class, 'get_homework']);
    Route::post("saveHomework", [HomeworkController::class, 'save_homework']);
    Route::post("updateHomework", [HomeworkController::class, 'update_homework']);
    Route::get("deleteHomework/{id?}", [HomeworkController::class, 'delete_homework']);

    //ACHIEVEMENT
    Route::get("getAchievement", [AchivementController::class, 'get_achievement']);
    Route::post("saveAchievement", [AchivementController::class, 'save_achievement']);
    Route::post("updateAchievement", [AchivementController::class, 'update_achievement']);
    Route::get("deleteAchievement/{id?}", [AchivementController::class, 'delete_achievement']);

    //BOOK PUBLICATION
    Route::get("getBookPublication/{staff_id?}", [BookPublicationController::class, 'get_book_publication']);
    Route::post("saveBookPublication", [BookPublicationController::class, 'save_book_publication']);
    Route::post("saveBookPublicationFile", [BookPublicationController::class, 'save_upload_file_publication']);
    Route::post("saveBookPublicationOwn", [BookPublicationController::class, 'save_book_publication_own']);
    Route::post("updateBookPublication", [BookPublicationController::class, 'update_book_publication']);
    Route::get("deleteBookPublication/{id?}", [BookPublicationController::class, 'delete_book_publication']);
    Route::post("saveBookPublicationApp", [BookPublicationController::class, 'save_book_publication_app']);

    //OWN ACHIEVEMENT
    // Route::get("getOwnAchievement", [AchivementController::class, 'get_own_achievement']);
    Route::post("saveOwnAchievement", [AchivementController::class, 'save_own_achievement']);
    Route::post("updateOwnAchievement", [AchivementController::class, 'update_own_achievement']);
    Route::get("deleteOwnAchievement/{id?}", [AchivementController::class, 'delete_own_achievement']);

    //STUDENT ENQUIRY
    Route::get("getAdmissionEnquiry", [AdmissionEnquiryController::class, 'get_admission_enquiry']);
    Route::post("saveAdmissionEnquiry", [AdmissionEnquiryController::class, 'save_admission_enquiry']);
    Route::post("updateAdmissionEnquiry", [AdmissionEnquiryController::class, 'update_admission_enquiry']);
    Route::get("deleteAdmissionEnquiry/{id?}", [AdmissionEnquiryController::class, 'delete_admission_enquiry']);

    //CALL LOG
    Route::get("getCallLog", [CallLogController::class, 'get_call_log']);
    Route::post("saveCallLog", [CallLogController::class, 'save_call_log']);
    Route::post("updateCallLog", [CallLogController::class, 'update_call_log']);
    Route::get("deleteCallLog/{id?}", [CallLogController::class, 'delete_call_log']);

    //POSTAL DISPATCH AND RECEIVE
    Route::get("getPostalDispatch", [PostalController::class, 'get_postal_dispatch']);
    Route::get("getPostalReceive", [PostalController::class, 'get_postal_receive']);
    Route::post("savePostal", [PostalController::class, 'save_postal']);
    Route::post("updatePostal", [PostalController::class, 'update_postal']);
    Route::get("deletePostal/{id?}", [PostalController::class, 'delete_postal']);

    //CERTIFICATE
    Route::get("getCertificate", [CertificateController::class, 'get_certificates']);
    Route::post("saveCertificate", [CertificateController::class, 'save_certificates']);
    Route::post("updateCertificate", [CertificateController::class, 'update_certificates']);
    Route::get("deleteCertificate/{id?}", [CertificateController::class, 'delete_certificates']);
    Route::post("getStudentForCertificate", [CertificateController::class, 'get_student_for_certificate']);
    Route::post("getCertificateByUser", [CertificateController::class, 'get_certificate_by_user']);

    //AGENT PAYMENT
    Route::post("saveAgentPayment", [AgentPaymentController::class, 'save_agent_payment']);
    Route::get("getAgentDetails/{id}", [AgentPaymentController::class, 'get_agent_payment_details']);
    Route::get("getAgentPayment", [AgentPaymentController::class, 'get_agent_payment']);
    Route::post("updateAgentPayment", [AgentPaymentController::class, 'update_agent_payment']);
    Route::get("deleteAgentPayment/{id}", [AgentPaymentController::class, 'delete_agent_payment']);

    //REPORT
    Route::post("getAttendancePercentage", [AttendanceController::class, 'attendance_percentage']);
    Route::post("getExamReport", [AnswersheetController::class, 'get_exam_report']);
    Route::post("getFeesCollectionReport", [PaymentController::class, 'get_fees_collection_report']);
    Route::post("getIncomeReport", [IncomeController::class, 'get_income_report']);
    Route::post("getExpenseReport", [ExpenseController::class, 'get_expense_report']);


    //CHAT
    Route::get("getChat", [ChatController::class, 'get_chat']);
    Route::post("saveChat", [ChatController::class, 'save_chat']);
});

//CORN JOB
Route::get("calculateFine", [LibraryIssueController::class, 'calculate_fine']);

Route::get("getDueFeesReport", [PaymentController::class, 'get_due_fees_report']);


//TEST
Route::get("test/{studentId}", [PaymentController::class, 'get_student_amount']);
Route::get("test", [PaymentController::class, 'test_func']);
Route::get("get_total_discount/{studentId}/{feesTypeId}", [PaymentController::class, 'get_total_discount']);
Route::post("getStudentReport", [UserController::class, 'get_student_by_date']);


// LOGIN
Route::get("clearPersonalAccessToken", [UserController::class, 'delete_personal_access_token']);
Route::post("createUser", [UserController::class, 'create_user']);


Route::get("getDueFees/{id}", [FeesTypeController::class, 'get_due_fees']);


//STUDENT TOTAL PAID
Route::get("studentTotalPaid/{id}", [PaymentController::class, 'student_total_paid']);


//COMMUNICATION
Route::post("mailCommunication", [MemberController::class, 'mail_communication']);

//UPLOAD FILE
Route::post("uploadFile", [CourseController::class, 'upload_file']);


Route::get("tmail", [FeesTypeController::class, 'testMail']);


//test api
Route::get("testMigration", [MemberController::class, 'test_migration']);

// count(json_decode($data->semester_by_course(3)->content(),true)['data']); semester controller
