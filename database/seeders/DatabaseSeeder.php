<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\RolesAndPermission;
use App\Models\User;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(FranchiseSeeder::class);
        $this->call(AgentSeeder::class);
        $this->call(SessionSeeder::class);
        $this->call(UserTypeSeeder::class);
        $this->call(HotelTypeSeeder::class);
        $this->call(CategorySeeder::class);
//        \App\Models\Category::factory()->count(10)->create();
        \App\Models\User::factory()->count(50)->create();
        $this->call(SubjectSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(WeekDaysSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(MenuManagementSeeder::class);
        $this->call(ErpSettingsSeeder::class);
        $user = new User();
        $user->identification_no = "sdfdsfds";
        $user->first_name = "werewtret";
        $user->last_name = "trytrytr";
        $user->gender = "male";
        $user->dob = "2000-09-12";
        $user->category_id = 1;
        $user->email= "admin@admin.com";
        $user->franchise_id= 1;
        $user->user_type_id= 1;
        $user->password= "12345678";
        $user->save();

        $user = new User();
        $user->identification_no = "self";
        $user->first_name = "self";
        $user->last_name = "";
        $user->dob = "2000-09-12";
        $user->category_id = 1;
        $user->email= "agent@gmail.com";
        $user->franchise_id= 1;
        $user->user_type_id= 5;
        $user->password= "12345678";
        $user->save();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
