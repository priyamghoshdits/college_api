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
        Schema::create('invigilators', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_examination')->nullable(true);
            $table->string('course_name')->nullable(true);
            $table->string('subject')->nullable(true);
            $table->string('from_date')->nullable(true);
            $table->string('to_date')->nullable(true);
            $table->string('name_of_institute')->nullable(true);
            $table->string('appointed_by')->nullable(true);
            $table->string('file_name')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invigilators');
    }
};
