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
        Schema::create('marksheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreignId('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreignId('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreignId('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('session_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->integer('marks')->nullable(false);
            $table->integer('full_marks')->nullable(false);
            $table->integer('grade')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marksheets');
    }
};
