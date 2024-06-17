<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::insert([
            ['name' => 'COURSE'],
            ['name' => 'SESSION'],
            ['name' => 'SUBJECT'],
            ['name' => 'SEMESTER'],
            ['name' => 'SUBJECT GROUP'],
            ['name' => 'ASSIGN SEMESTER TEACHER'],
            ['name' => 'CREATE SEMESTER TIMETABLE'],
            ['name' => 'STAFF'],
            ['name' => 'LEAVE TYPE'],
            ['name' => 'ALLOCATE LEAVE'],
            ['name' => 'APPLY LEAVE'],
            ['name' => 'DEPARTMENT'],
            ['name' => 'DESIGNATION'],
            ['name' => 'CASTE'],
            ['name' => 'HOLIDAY'],
            ['name' => 'PAYROLL'],
            ['name' => 'PAYROLL TYPES'],
            ['name' => 'PERIOD ATTENDANCE'], // TO BE DONE LATER
            ['name' => 'ADD ITEM'],
            ['name' => 'ISSUE BOOK'],
            ['name' => 'UPLOAD DIGITAL BOOK'],
            ['name' => 'ADD HOSTEL'],
            ['name' => 'ROOM TYPE'],
            ['name' => 'ADD HOSTEL ROOM'],
            ['name' => 'INTERNSHIP PROVIDER'],
            ['name' => 'INTERNSHIP DETAILS'],
            ['name' => 'STUDENT ADMISSION'],
            ['name' => 'NOTICE'],
            ['name' => 'SUBJECT DETAILS'],
            ['name' => 'SUBJECT QUESTION'],
            ['name' => 'FEES TYPE'],
            ['name' => 'FEES STRUCTURE'],
            ['name' => 'COLLECT FEES'],
            ['name' => 'DISCOUNT'],
            ['name' => 'AGENT'],
            ['name' => 'FRANCHISE'],
            ['name' => 'AGENT STUDENT ENTRY'],
            ['name' => 'USER TYPE'],
            ['name' => 'UPLOAD CONTENT'],
            ['name' => 'INVENTORY ADD ITEM'],
            ['name' => 'INVENTORY ISSUE ITEM'],
            ['name' => 'INVENTORY ITEM STOCK'],
            ['name' => 'INVENTORY ITEM STORE'],
            ['name' => 'INVENTORY ITEM SUPPLIER'],
            ['name' => 'INVENTORY ITEM TYPE'],
            ['name' => 'INCOME HEAD'],
            ['name' => 'ADD INCOME'],
            ['name' => 'EXPENSE HEAD'],
            ['name' => 'ADD EXPENSE'],
            ['name' => 'AGENT PAYMENT'],
            ['name' => 'VIRTUAL CLASS'],
            ['name' => 'VIRTUAL MEETING'],
            ['name' => 'HOMEWORK'],

            ['name' => 'VISITOR BOOK'],
            ['name' => 'ADMISSION ENQUIRY'],
            ['name' => 'CALL LOG'],
            ['name' => 'POSTAL DISPATCH'],
            ['name' => 'POSTAL RECEIVE'],

            ['name' => 'ROUTES'],
            ['name' => 'VEHICLE'],
            ['name' => 'ASSIGN VEHICLE'],

            ['name' => 'ADD COMPANY DETAILS'],
            ['name' => 'PLACEMENT'],
            ['name' => 'ACHIEVEMENT'],

//            ['name' => 'ASSIGNMENT'],
//            ['name' => 'STUDY MATERIAL'], //35

        ]);
    }
}
