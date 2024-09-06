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
        Schema::create('clinical_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('course_name')->nullable();
            $table->string('year_semester')->nullable();
            $table->string('duration')->nullable();
            $table->string('training_organization')->nullable();
            $table->string('training_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinical_trainings');
    }
};
