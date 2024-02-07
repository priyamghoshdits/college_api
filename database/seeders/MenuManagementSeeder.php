<?php

namespace Database\Seeders;

use App\Models\MenuManagement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuManagementSeeder extends Seeder
{
    public function run(): void
    {
        MenuManagement::insert([
            ['user_type_id' => '1' , 'name' => 'Academics' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Subject Group' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Assign Semester Teacher' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Create Semester Timetable' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Semester Timetable' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Course' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Semester' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Subject' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Session' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Promote Students' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '1' , 'name' => 'Human Resource' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Staff' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Leave Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Allocate Leave' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Apply Leave' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Department' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Designation' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Category' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Holiday' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '1' , 'name' => 'Attendance' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Period Attendance' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '1' , 'name' => 'Library' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Add Item' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Issue Book' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1' , 'name' => 'Hostel' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Add Hostel' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Room Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Add Hostel Room' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1' , 'name' => 'Inventory' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Item Category' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Add Item' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '1' , 'name' => 'Internship' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Internship Provider' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Internship Details' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '1' , 'name' => 'Student Information' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Student Admission' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1' , 'name' => 'Communication' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Notice' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '1' , 'name' => 'Examination' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Subject Details' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Subject Question' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Exam' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1' , 'name' => 'Fees Collection' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Fees Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Fees Structure' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Collect Fees' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Discount/Scholarship' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1' , 'name' => 'Others' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Agent' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Add User Type' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '1' , 'name' => 'Download Center' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Upload Content' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Study Material' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '1' , 'name' => 'Assignment' , 'permission' => true, 'franchise_id' => 1],





            //USER 2
            ['user_type_id' => '2' , 'name' => 'Academics' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Subject Group' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Assign Semester Teacher' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Create Semester Timetable' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Semester Timetable' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Course' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Semester' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Subject' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Session' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Promote Students' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '2' , 'name' => 'Human Resource' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Staff' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Leave Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Allocate Leave' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Apply Leave' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Department' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Designation' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Category' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Holiday' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '2' , 'name' => 'Attendance' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Period Attendance' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '2' , 'name' => 'Library' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Add Item' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Issue Book' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2' , 'name' => 'Hostel' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Add Hostel' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Room Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Add Hostel Room' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2' , 'name' => 'Inventory' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Item Category' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Add Item' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '2' , 'name' => 'Internship' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Internship Provider' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Internship Details' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '2' , 'name' => 'Student Information' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Student Admission' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2' , 'name' => 'Communication' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Notice' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '2' , 'name' => 'Examination' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Subject Details' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Subject Question' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Exam' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2' , 'name' => 'Fees Collection' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Fees Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Fees Structure' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Collect Fees' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Discount/Scholarship' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2' , 'name' => 'Others' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Agent' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Add User Type' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '2' , 'name' => 'Download Center' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Upload Content' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Study Material' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '2' , 'name' => 'Assignment' , 'permission' => true, 'franchise_id' => 1],



            //USER 3
            ['user_type_id' => '3' , 'name' => 'Academics' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Subject Group' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Assign Semester Teacher' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Create Semester Timetable' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Semester Timetable' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Course' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Semester' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Subject' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Session' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Promote Students' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '3' , 'name' => 'Human Resource' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Staff' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Leave Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Allocate Leave' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Apply Leave' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Department' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Designation' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Category' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Holiday' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '3' , 'name' => 'Attendance' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Period Attendance' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '3' , 'name' => 'Library' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Add Item' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Issue Book' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3' , 'name' => 'Hostel' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Add Hostel' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Room Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Add Hostel Room' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3' , 'name' => 'Inventory' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Item Category' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Add Item' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '3' , 'name' => 'Internship' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Internship Provider' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Internship Details' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '3' , 'name' => 'Student Information' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Student Admission' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3' , 'name' => 'Communication' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Notice' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '3' , 'name' => 'Examination' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Subject Details' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Subject Question' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Exam' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3' , 'name' => 'Fees Collection' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Fees Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Fees Structure' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Collect Fees' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Discount/Scholarship' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3' , 'name' => 'Others' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Agent' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Add User Type' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '3' , 'name' => 'Download Center' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Upload Content' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Study Material' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '3' , 'name' => 'Assignment' , 'permission' => true, 'franchise_id' => 1],


//            USER 4
            ['user_type_id' => '4' , 'name' => 'Academics' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Subject Group' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Assign Semester Teacher' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Create Semester Timetable' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Semester Timetable' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Course' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Semester' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Subject' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Session' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Promote Students' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '4' , 'name' => 'Human Resource' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Staff' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Leave Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Allocate Leave' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Apply Leave' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Department' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Designation' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Category' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Holiday' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '4' , 'name' => 'Attendance' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Period Attendance' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '4' , 'name' => 'Library' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Add Item' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Issue Book' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4' , 'name' => 'Hostel' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Add Hostel' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Room Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Add Hostel Room' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4' , 'name' => 'Inventory' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Item Category' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Add Item' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '4' , 'name' => 'Internship' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Internship Provider' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Internship Details' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '4' , 'name' => 'Student Information' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Student Admission' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4' , 'name' => 'Communication' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Notice' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '4' , 'name' => 'Examination' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Subject Details' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Subject Question' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Exam' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4' , 'name' => 'Fees Collection' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Fees Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Fees Structure' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Collect Fees' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Discount/Scholarship' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4' , 'name' => 'Others' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Agent' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Add User Type' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '4' , 'name' => 'Download Center' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Upload Content' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Study Material' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '4' , 'name' => 'Assignment' , 'permission' => true, 'franchise_id' => 1],

//            USER 5
            ['user_type_id' => '5' , 'name' => 'Academics' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Subject Group' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Assign Semester Teacher' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Create Semester Timetable' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Semester Timetable' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Course' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Semester' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Subject' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Session' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Promote Students' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '5' , 'name' => 'Human Resource' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Staff' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Leave Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Allocate Leave' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Apply Leave' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Department' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Designation' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Category' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Holiday' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '5' , 'name' => 'Attendance' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Period Attendance' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '5' , 'name' => 'Library' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Add Item' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Issue Book' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5' , 'name' => 'Hostel' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Add Hostel' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Room Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Add Hostel Room' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5' , 'name' => 'Inventory' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Item Category' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Add Item' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '5' , 'name' => 'Internship' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Internship Provider' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Internship Details' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '5' , 'name' => 'Student Information' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Student Admission' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5' , 'name' => 'Communication' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Notice' , 'permission' => true, 'franchise_id' => 1],


            ['user_type_id' => '5' , 'name' => 'Examination' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Subject Details' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Subject Question' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Exam' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5' , 'name' => 'Fees Collection' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Fees Type' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Fees Structure' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Collect Fees' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Discount/Scholarship' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5' , 'name' => 'Others' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Agent' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Add User Type' , 'permission' => true, 'franchise_id' => 1],

            ['user_type_id' => '5' , 'name' => 'Download Center' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Upload Content' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Study Material' , 'permission' => true, 'franchise_id' => 1],
            ['user_type_id' => '5' , 'name' => 'Assignment' , 'permission' => true, 'franchise_id' => 1],
        ]);
    }
}
