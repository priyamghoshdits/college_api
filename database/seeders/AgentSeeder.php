<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agent::insert([
            ['name' => 'self', 'mobile_no'=> 'xx' , 'address' => 'xx' , 'status' => 1, 'commission_flat'=> 0, 'commission_percentage' => 0],
        ]);
    }
}
