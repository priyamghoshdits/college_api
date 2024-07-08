<?php

namespace Database\Seeders;

use App\Models\ErpSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ErpSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $erp_setting = new ErpSettings();
        $erp_setting->title = "COLLEGE MANAGEMENT";
        $erp_setting->fav_icon = "favicon.png";
        $erp_setting->save();
    }
}
