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
        Schema::create('education_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable(false);
            $table->string('board_ten');
            $table->string('marks_obtained_ten');
            $table->string('percentage_ten');
            $table->string('division_ten');
            $table->string('main_subject_ten');
            $table->string('year_of_passing_ten');
            $table->string('file_ten');

            $table->string('board_twelve');
            $table->string('marks_obtained_twelve');
            $table->string('percentage_twelve');
            $table->string('division_twelve');
            $table->string('main_subject_twelve');
            $table->string('year_of_passing_twelve');
            $table->string('file_twelve');

            $table->string('board_graduation');
            $table->string('marks_obtained_graduation');
            $table->string('percentage_graduation');
            $table->string('division_graduation');
            $table->string('main_subject_graduation');
            $table->string('year_of_passing_graduation');
            $table->string('file_graduation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_qualifications');
    }
};
