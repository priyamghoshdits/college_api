<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::insert([
            ['course_name' => 'course 1', 'duration' => 1],
//            ['course_name' => 'course 2', 'duration' => 1],
        ]);
    }
}
