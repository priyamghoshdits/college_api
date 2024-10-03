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
            $table->string('date_of_publication')->nullable(true);
            $table->string('exam_marks')->nullable(true);
            $table->string('total_number_score')->nullable(true);
            $table->string('percentage')->nullable(true);
            $table->string('grade')->nullable(true);
            $table->string('division')->nullable(true);
            $table->string('year_semester')->nullable(true);
            $table->string('institutional_rank')->nullable(true);
            $table->string('university_rank')->nullable(true);
            $table->string('file_name')->nullable(true);
            $table->string('university_rank_file_name')->nullable(true);
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
