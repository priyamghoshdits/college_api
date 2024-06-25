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
        Schema::create('class_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('topic')->nullable(true);
            $table->string('started_by')->nullable(true);
            $table->string('time_on')->nullable(true);
            $table->string('ended_by')->nullable(true);
            $table->string('ended_on')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_statuses');
    }
};
