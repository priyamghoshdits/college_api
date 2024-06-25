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
        Schema::create('staff_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('degree')->nullable();
            $table->string('specialization')->nullable();
            $table->string('university_name')->nullable();
            $table->string('percentage')->nullable();
            $table->string('grade')->nullable();
            $table->string('file_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_education');
    }
};
