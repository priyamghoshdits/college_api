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
        Schema::create('education_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable(false);
            $table->string('class');
            $table->string('board');
            $table->string('marks_obtain');
            $table->string('percentage');
            $table->string('division');
            $table->string('main_subject');
            $table->string('year_of_passing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_qualifications');
    }
};
