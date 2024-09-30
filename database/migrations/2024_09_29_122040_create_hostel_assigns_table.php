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
        Schema::create('hostel_assigns', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->nullable();
            $table->string('course_id')->nullable();
            $table->string('semester_id')->nullable();
            $table->string('student_id')->nullable();
            $table->string('hostel_room_id')->nullable();
            $table->string('from_date')->nullable();
            $table->string('to_date')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hostel_assigns');
    }
};
