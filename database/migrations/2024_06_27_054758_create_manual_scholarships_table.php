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
            $table->string('course_id');
            $table->string('semester_id');
            $table->string('student_id');
            $table->string('type_of_scholarship');
            $table->string('amount');
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
