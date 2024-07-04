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
        Schema::create('paper_posters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('topic_name')->nullable();
            $table->string('type')->nullable();
            $table->string('venue')->nullable();
            $table->string('organized_by')->nullable();
            $table->string('seminer_topic')->nullable();
            $table->string('seminer_type')->nullable();
            $table->string('date_from')->nullable();
            $table->string('date_to')->nullable();
            $table->string('duration')->nullable();
            $table->string('acivement')->nullable();
            $table->string('file_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paper_posters');
    }
};
