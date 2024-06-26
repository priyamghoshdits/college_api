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
        Schema::create('pg_phd_guides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('student_name')->nullable();
            $table->string('course')->nullable();
            $table->string('title_name')->nullable();
            $table->string('guide')->nullable();
            $table->string('co_guide')->nullable();
            $table->string('referance_no')->nullable(null);
            $table->string('ref_date')->nullable(null);
            $table->string('file_name')->nullable(null);
            $table->string('status')->nullable(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pg_phd_guides');
    }
};
