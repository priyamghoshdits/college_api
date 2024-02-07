<?php

namespace Database\Seeders;

use App\Models\HotelType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HotelType::insert([
            ['name' => 'Girls'],
            ['name' => 'Boys'],
            ['name' => 'Combine'],
        ]);
    }
}
