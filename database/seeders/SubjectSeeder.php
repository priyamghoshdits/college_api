<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::insert([
            ['name' => 'subject 1', 'subject_code' => 'S1'],
            ['name' => 'subject 2', 'subject_code' => 'S2'],
            ['name' => 'subject 3', 'subject_code' => 'S3'],
        ]);
    }
}
