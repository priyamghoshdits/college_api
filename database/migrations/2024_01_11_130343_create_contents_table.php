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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable(false);
            $table->string("type")->nullable(false);
            $table->date("upload_date")->nullable(true);
//            $table->date("assignment_date")->nullable(true);
            $table->integer('course_id')->nullable(true);
            $table->integer('semester_id')->nullable(true);
            $table->integer('subject_id')->nullable(true);
            $table->string("content_name")->nullable(false);
            $table->string("description")->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
