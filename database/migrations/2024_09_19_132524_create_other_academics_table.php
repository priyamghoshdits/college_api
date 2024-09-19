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
        Schema::create('other_academics', function (Blueprint $table) {
            $table->id();
            $table->string('designation')->nullable(true);
            $table->string('appointed_by')->nullable(true);
            $table->string('date_of_appointment')->nullable(true);
            $table->string('file_name')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_academics');
    }
};
