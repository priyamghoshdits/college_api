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
        Schema::create('consultancies', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id')->nullable(false);
            $table->string('project_consultancy')->nullable(true);
            $table->string('sponsored_by')->nullable(true);
            $table->string('consultant')->nullable(true);
            $table->string('amount')->nullable(true);
            $table->string('duration')->nullable(true);
            $table->string('status')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultancies');
    }
};
