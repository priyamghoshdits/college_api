<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Session::insert([
            ['name' => '2021-2022', 'franchise_id' => 1],
            ['name' => '2023-2024', 'franchise_id' => 1],
            ['name' => '2024-2025', 'franchise_id' => 1],
        ]);
    }
}
