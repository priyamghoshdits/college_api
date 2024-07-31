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
        Schema::create('seminar_workshop_faculties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title_of_seminar')->nullable(true);
            $table->string('type_of_seminar')->nullable(true);
            $table->string('organized_by')->nullable(true);
            $table->string('duration')->nullable(true);
            $table->string('date')->nullable(true);
            $table->string('end_date')->nullable(true);
            $table->string('file_name')->nullable(true);
            $table->string('achievement')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminar_workshop_faculties');
    }
};
