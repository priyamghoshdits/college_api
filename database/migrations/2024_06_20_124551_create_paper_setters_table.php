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
        Schema::create('paper_setters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('examination_name')->nullable(true);
            $table->string('subject_name')->nullable(true);
            $table->string('university_name')->nullable(true);
            $table->string('referance_no')->nullable(true);
            $table->string('ref_date')->nullable(true);
            $table->string('paper_file')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paper_setters');
    }
};
