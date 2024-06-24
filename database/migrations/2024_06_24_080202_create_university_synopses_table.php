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
            $table->foreignId('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('institute_name')->nullable();
            $table->string('title')->nullable();
            $table->string('course')->nullable();
            $table->string('referance_no')->nullable(null);
            $table->string('ref_date')->nullable(null);
            $table->string('date_evaluation')->nullable();
            $table->string('file_name')->nullable(null);
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
