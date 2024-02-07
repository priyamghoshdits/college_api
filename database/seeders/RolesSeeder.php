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
            ['name' => 'STAFF'],
            ['name' => 'LEAVE TYPE'],
            ['name' => 'ALLOCATE LEAVE'],
            ['name' => 'APPLY LEAVE'],
            ['name' => 'DEPARTMENT'],
            ['name' => 'DESIGNATION'],
            ['name' => 'CATEGORY'],
            ['name' => 'HOLIDAY'],
            ['name' => 'PERIOD ATTENDANCE'], // TO BE DONE LATER
            ['name' => 'ADD ITEM'],
            ['name' => 'ISSUE BOOK'],
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
            ['name' => 'ADD USER TYPE'],
            ['name' => 'UPLOAD CONTENT'],
            ['name' => 'ASSIGNMENT'],
            ['name' => 'STUDY MATERIAL'], //35

        ]);
    }
}
