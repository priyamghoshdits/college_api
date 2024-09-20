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
        Schema::create('university_adjudicator_theses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name')->nullable(true);
            $table->string('student_name')->nullable(true);
            $table->string('thesis_type_id')->nullable(true);
            $table->string('institute_name')->nullable(true);
            $table->string('title')->nullable(true);
            $table->string('date_of_evaluation')->nullable(true);
            $table->string('reference_no')->nullable(true);
            $table->string('name_of_university')->nullable(true);
            $table->string('date')->nullable(true);
            $table->string('guide')->nullable(true);
            $table->string('co_guide')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_adjudicator_theses');
    }
};
