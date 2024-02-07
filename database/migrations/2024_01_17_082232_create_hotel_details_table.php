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
        Schema::create('hotel_details', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable(false);
            $table->foreignId('hostel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreignId('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
            $table->integer("no_of_bed")->nullable(false);
            $table->integer("cost_per_bed")->nullable(false);
            $table->string("description")->nullable(false);
            $table->foreignId('franchise_id')->references('id')->on('franchises')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_details');
    }
};
