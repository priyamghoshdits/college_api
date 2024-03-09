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
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreignId('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreignId('current_semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreignId('agent_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('session_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->date('admission_date')->nullable(true);

            $table->string("emergency_phone_number")->nullable(true);
            $table->string("current_address")->nullable(true);
            $table->string("permanent_address")->nullable(true);
            $table->string("mother_phone")->nullable(true);
            $table->string("guardian_relation")->nullable(true);
            $table->string("guardian_occupation")->nullable(true);

            $table->string("father_name")->nullable(true);
            $table->string("father_occupation")->nullable(true);
            $table->string("father_phone")->nullable(true);
            $table->string("mother_name")->nullable(true);
            $table->string("mother_occupation")->nullable(true);
            $table->string("guardian_name")->nullable(true);
            $table->string("guardian_phone")->nullable(true);
            $table->string("material_status")->nullable(true);
            $table->string("guardian_email")->nullable(true);
            $table->string("guardian_address")->nullable(true);
            $table->integer('admission_status')->default(1);
            //0 for pre-admission, 1 for admitted, 2 for passed, 3 left
            $table->integer('pre_admission_payment_id')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_details');
    }
};
