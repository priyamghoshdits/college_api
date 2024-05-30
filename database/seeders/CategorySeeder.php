<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'General'],
            ['name' => 'ST'],
            ['name' => 'SC'],
            ['name' => 'OBC A'],
            ['name' => 'OBC B'],
        ]);
    }
}
