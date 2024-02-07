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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_details_id')->references('id')->on('subject_details')->onDelete('cascade');
            $table->string('question')->nullable(false);
            $table->string('option_1')->nullable(false);
            $table->string('option_2')->nullable(false);
            $table->string('option_3')->nullable(false);
            $table->string('option_4')->nullable(false);
            $table->integer('marks')->nullable(false);
            $table->integer('answer')->nullable(false);
            $table->integer('status')->default(1);
            $table->foreignId('franchise_id')->references('id')->on('franchises')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
