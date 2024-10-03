<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('manual_scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('course_id')->nullable(true);
            $table->string('semester_id')->nullable(true);
            $table->string('student_id')->nullable(true);
            $table->string('course_year')->nullable(true);
            $table->string('scholarship_master_id')->nullable(true);
            $table->string('type_of_scholarship')->nullable(true);
            $table->string('amount')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manual_scholarships');
    }
};
