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
        Schema::create('student_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('date_of_publication')->nullable();
            $table->string('exam_marks')->nullable();
            $table->string('total_number_score')->nullable();
            $table->string('percentage')->nullable();
            $table->string('grade')->nullable();
            $table->string('division')->nullable();
            $table->string('year_semester')->nullable();
            $table->string('file_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_results');
    }
};
