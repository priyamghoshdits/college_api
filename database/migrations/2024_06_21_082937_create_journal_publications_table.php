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
        Schema::create('journal_publications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('journal_name')->nullable(true);
            $table->string('publication')->nullable(true);
            $table->string('ugc_affiliation')->nullable(true);
            $table->string('volume_page_number')->nullable(true);
            $table->string('university_name')->nullable(true);
            $table->string('issn_number')->nullable(true);
            $table->string('topic_name')->nullable(true);
            $table->string('impact_factor')->nullable(true);
            $table->string('file_name')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journal_publications');
    }
};
