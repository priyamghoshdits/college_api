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
        Schema::create('visitor_books', function (Blueprint $table) {
            $table->id();
            $table->string('purpose');
            $table->string('name');
            $table->string('phone');
            $table->string('icard')->nullable(true);
            $table->string('date');
            $table->string('time_in')->nullable(true);
            $table->string('time_out')->nullable(true);
            $table->string('note')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_books');
    }
};
