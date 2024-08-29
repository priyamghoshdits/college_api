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
        Schema::create('internship_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internship_provider_id')->references('id')->on('internship_providers')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date("from_date")->nullable(false);
            $table->date("to_date")->nullable(false);
            $table->date("internship_file")->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_details');
    }
};
