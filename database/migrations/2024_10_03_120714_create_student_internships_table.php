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
        Schema::create('student_internships', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id')->nullable(true);
            $table->integer('semester_id')->nullable(true);
            $table->integer('session_id')->nullable(true);
            $table->integer('student_id')->nullable(true);
            $table->string('from_date')->nullable(true);
            $table->string('to_date')->nullable(true);
            $table->string('institutional_name')->nullable(true);
            $table->string('file_name')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_internships');
    }
};
