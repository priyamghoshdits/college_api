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
        Schema::create('manual_fees', function (Blueprint $table) {
            $table->id();
            $table->string('course_id');
            $table->string('semester_id');
            $table->string('student_id');
            $table->string('date_of_payment');
            $table->string('amount');
            $table->string('file_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manual_fees');
    }
};
