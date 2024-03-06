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
        Schema::create('library_stocks', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable(false);
            $table->foreignId('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreignId('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreignId('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->integer("isbn_no");
            $table->integer("publisher_name");
            $table->integer("author_name");
            $table->integer("rack_number");
            $table->integer("book_price");
            $table->integer("description");
            $table->integer("quantity")->default(0);
            $table->integer("remaining")->default(0);
            $table->foreignId('franchise_id')->references('id')->on('franchises')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_stocks');
    }
};
