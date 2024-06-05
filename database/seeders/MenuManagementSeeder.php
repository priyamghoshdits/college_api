<?php

namespace Database\Seeders;

use App\Models\MenuManagement;
use Illuminate\Database\Seeder;

class MenuManagementSeeder extends Seeder
{
    public function run(): void
    {
        MenuManagement::insert([
            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Academics', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Subject Group', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Assign Semester Teacher', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Create Semester Timetable', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Semester Timetable', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Course', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Semester', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Subject', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Session', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Promote Students', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Human Resource', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Staff', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Staff Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Leave Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Allocate Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Apply Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Approve Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Department', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Designation', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Caste', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Holiday', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Payroll', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Payroll Types', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Period Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Show Attendance', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Library', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Add Item', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Issue Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Upload Digital Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Download Digital Book', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Income', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Income Head', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Add Income', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Expense', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Expense Head', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Add Expense', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Hostel', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Add Hostel', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Room Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Add Hostel Room', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Inventory', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Item Category', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Add Item', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Internship', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Internship Provider', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Internship Details', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Job', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Add Company Details', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Placement', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Student Information', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Student Admission', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Communication', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Notice', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Examination', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Subject Details', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Subject Question', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Exam', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Virtual Class Meeting', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Virtual Class', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Virtual Meeting', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Front Desk', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Visitor Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Admission Enquiry', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Call Log', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Postal Dispatch', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Postal Receive', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Homework', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Add Homework', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Transport', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Routes', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Vehicle', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Assign Vehicle', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Fees Collection', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Fees Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Fees Structure', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Collect Fees', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Discount/Scholarship', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Attendance report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Examination report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Fees Collection report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Admission report', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Others', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Agent', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Roles And Permission', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Add User Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Icard', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Agent Student Entry', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Agent Payment', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Download Center', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Upload Content', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Study Material', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Assignment', 'permission' => true, 'franchise_id' => 1],


            //USER 2
            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Academics', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Subject Group', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Assign Semester Teacher', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Create Semester Timetable', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Semester Timetable', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Course', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Semester', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Subject', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Session', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Promote Students', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Human Resource', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Staff', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Staff Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Leave Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Allocate Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Apply Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Approve Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Department', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Designation', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Caste', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Holiday', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Payroll', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Payroll Types', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Period Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Show Attendance', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Library', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Add Item', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Issue Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Upload Digital Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Download Digital Book', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Income', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Income Head', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Add Income', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Expense', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Expense Head', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Add Expense', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Hostel', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Add Hostel', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Room Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Add Hostel Room', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Inventory', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Item Category', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Add Item', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Internship', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Internship Provider', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Internship Details', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Job', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Add Company Details', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Placement', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Student Information', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Student Admission', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Communication', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Notice', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Examination', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Subject Details', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Subject Question', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Exam', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Virtual Class Meeting', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Virtual Class', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Virtual Meeting', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Front Desk', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Visitor Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Admission Enquiry', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Call Log', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Postal Dispatch', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Postal Receive', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Homework', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Add Homework', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Transport', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Routes', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Vehicle', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Assign Vehicle', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Fees Collection', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Fees Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Fees Structure', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Collect Fees', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Discount/Scholarship', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Attendance report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Examination report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Fees Collection report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Admission report', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Others', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Agent', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Roles And Permission', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Add User Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Icard', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Agent Student Entry', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Agent Payment', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2', 'groups' => 1, 'name' => 'Download Center', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Upload Content', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Study Material', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2', 'groups' => 0, 'name' => 'Assignment', 'permission' => true, 'franchise_id' => 1],


            //USER 3
            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Academics', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Subject Group', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Assign Semester Teacher', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Create Semester Timetable', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Semester Timetable', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Course', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Semester', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Subject', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Session', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Promote Students', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Human Resource', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Staff', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Staff Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Leave Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Allocate Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Apply Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Approve Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Department', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Designation', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Caste', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Holiday', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Payroll', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Payroll Types', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Period Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Show Attendance', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Library', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Add Item', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Issue Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Upload Digital Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Download Digital Book', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Income', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Income Head', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Add Income', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1', 'groups' => 1, 'name' => 'Expense', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Expense Head', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1', 'groups' => 0, 'name' => 'Add Expense', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Hostel', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Add Hostel', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Room Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Add Hostel Room', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Inventory', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Item Category', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Add Item', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Internship', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Internship Provider', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Internship Details', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Job', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Add Company Details', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Placement', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Student Information', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Student Admission', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Communication', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Notice', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Examination', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Subject Details', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Subject Question', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Exam', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Virtual Class Meeting', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Virtual Class', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Virtual Meeting', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Front Desk', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Visitor Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Admission Enquiry', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Call Log', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Postal Dispatch', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Postal Receive', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Homework', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Add Homework', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Transport', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Routes', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Vehicle', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Assign Vehicle', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Fees Collection', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Fees Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Fees Structure', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Collect Fees', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Discount/Scholarship', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Attendance report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Examination report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Fees Collection report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Admission report', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Others', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Agent', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Roles And Permission', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Add User Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Icard', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Agent Student Entry', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Agent Payment', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3', 'groups' => 1, 'name' => 'Download Center', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Upload Content', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Study Material', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3', 'groups' => 0, 'name' => 'Assignment', 'permission' => true, 'franchise_id' => 1],


//            USER 4
            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Academics', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Subject Group', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Assign Semester Teacher', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Create Semester Timetable', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Semester Timetable', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Course', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Semester', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Subject', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Session', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Promote Students', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Human Resource', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Staff', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Staff Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Leave Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Allocate Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Apply Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Approve Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Department', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Designation', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Caste', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Holiday', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Payroll', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Payroll Types', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Period Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Show Attendance', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Library', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Add Item', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Issue Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Upload Digital Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Download Digital Book', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Income', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Income Head', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Add Income', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Expense', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Expense Head', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Add Expense', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Hostel', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Add Hostel', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Room Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Add Hostel Room', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Inventory', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Item Category', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Add Item', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Internship', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Internship Provider', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Internship Details', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Job', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Add Company Details', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Placement', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Student Information', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Student Admission', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Communication', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Notice', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Examination', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Subject Details', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Subject Question', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Exam', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Virtual Class Meeting', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Virtual Class', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Virtual Meeting', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Front Desk', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Visitor Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Admission Enquiry', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Call Log', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Postal Dispatch', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Postal Receive', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Homework', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Add Homework', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Transport', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Routes', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Vehicle', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Assign Vehicle', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Fees Collection', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Fees Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Fees Structure', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Collect Fees', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Discount/Scholarship', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Attendance report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Examination report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Fees Collection report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Admission report', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Others', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Agent', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Roles And Permission', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Add User Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Icard', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Agent Student Entry', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Agent Payment', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4', 'groups' => 1, 'name' => 'Download Center', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Upload Content', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Study Material', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4', 'groups' => 0, 'name' => 'Assignment', 'permission' => true, 'franchise_id' => 1],

//            USER 5
            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Academics', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Subject Group', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Assign Semester Teacher', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Create Semester Timetable', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Semester Timetable', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Course', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Semester', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Subject', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Session', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Promote Students', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Human Resource', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Staff', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Staff Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Leave Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Allocate Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Apply Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Approve Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Department', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Designation', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Caste', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Holiday', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Payroll', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Payroll Types', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Period Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Show Attendance', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Library', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Add Item', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Issue Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Upload Digital Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Download Digital Book', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Income', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Income Head', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Add Income', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Expense', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Expense Head', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Add Expense', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Hostel', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Add Hostel', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Room Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Add Hostel Room', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Inventory', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Item Category', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Add Item', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Internship', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Internship Provider', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Internship Details', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Job', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Add Company Details', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Placement', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Student Information', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Student Admission', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Communication', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Notice', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Examination', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Subject Details', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Subject Question', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Exam', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Virtual Class Meeting', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Virtual Class', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Virtual Meeting', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Front Desk', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Visitor Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Admission Enquiry', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Call Log', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Postal Dispatch', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Postal Receive', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Homework', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Add Homework', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Transport', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Routes', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Vehicle', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Assign Vehicle', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Fees Collection', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Fees Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Fees Structure', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Collect Fees', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Discount/Scholarship', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Attendance report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Examination report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Fees Collection report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Admission report', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Others', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Agent', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Roles And Permission', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Add User Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Icard', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Agent Student Entry', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Agent Payment', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5', 'groups' => 1, 'name' => 'Download Center', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Upload Content', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Study Material', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5', 'groups' => 0, 'name' => 'Assignment', 'permission' => true, 'franchise_id' => 1],


            // USER 6
            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Academics', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Subject Group', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Assign Semester Teacher', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Create Semester Timetable', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Semester Timetable', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Course', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Semester', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Subject', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Session', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Promote Students', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Human Resource', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Staff', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Staff Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Leave Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Allocate Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Apply Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Approve Leave', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Department', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Designation', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Caste', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Holiday', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Payroll', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Payroll Types', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Period Attendance', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Show Attendance', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Library', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Add Item', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Issue Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Upload Digital Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Download Digital Book', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Income', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Income Head', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Add Income', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Expense', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Expense Head', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Add Expense', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Hostel', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Add Hostel', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Room Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Add Hostel Room', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Inventory', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Item Category', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Add Item', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Internship', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Internship Provider', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Internship Details', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Job', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Add Company Details', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Placement', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Student Information', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Student Admission', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Communication', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Notice', 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Examination', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Subject Details', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Subject Question', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Exam', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Virtual Class Meeting', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Virtual Class', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Virtual Meeting', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Front Desk', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Visitor Book', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Admission Enquiry', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Call Log', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Postal Dispatch', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Postal Receive', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Homework', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Add Homework', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Transport', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Routes', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Vehicle', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Assign Vehicle', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Fees Collection', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Fees Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Fees Structure', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Collect Fees', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Discount/Scholarship', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Attendance report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Examination report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Fees Collection report', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Admission report', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Others', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Agent', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Roles And Permission', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Add User Type', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Icard', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Agent Student Entry', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Agent Payment', 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '6', 'groups' => 1, 'name' => 'Download Center', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Upload Content', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Study Material', 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '6', 'groups' => 0, 'name' => 'Assignment', 'permission' => true, 'franchise_id' => 1],
        ]);
    }
}
