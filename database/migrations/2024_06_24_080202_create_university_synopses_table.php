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
        Schema::create('university_synopses', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id');
            $table->string('student_name');
            $table->string('institute_name')->nullable();
            $table->string('title')->nullable();
            $table->string('course')->nullable();
            $table->string('synopsis_type_id')->nullable();
            $table->string('guide')->nullable();
            $table->string('co_guide')->nullable();
            $table->string('university_name')->nullable();
            $table->string('referance_no')->nullable(true);
            $table->string('ref_date')->nullable(true);
            $table->string('date_evaluation')->nullable();
            $table->string('file_name')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_synopses');
    }
};
