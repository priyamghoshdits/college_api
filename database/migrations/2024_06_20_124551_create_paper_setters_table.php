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
            $table->string('examination_name')->nullable(null);
            $table->string('subject_name')->nullable(null);
            $table->string('university_name')->nullable(null);
            $table->string('referance_no')->nullable(null);
            $table->string('ref_date')->nullable(null);
            $table->string('paper_file')->nullable(null);
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
