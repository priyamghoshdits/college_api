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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id')->nullable(true);
            $table->integer('semester_id')->nullable(true);
            $table->integer('subject_id')->nullable(true);
            $table->integer('session_id')->nullable(true);
            $table->string('class_type')->nullable(true);
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('attendance_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('user_type_id')->references('id')->on('user_types')->onDelete('cascade');
            $table->string('attendance')->nullable(false);
            $table->string('class')->nullable(true);
            $table->date('date')->nullable(false);
            $table->integer('class_status_id')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
