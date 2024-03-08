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
        Schema::create('virtual_meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_type_id')->references('id')->on('user_types')->onDelete('cascade');
            $table->string("topic");
            $table->string("platform");
            $table->string("link");
            $table->string("date_of_meeting");
            $table->string("time_of_meeting");
            $table->string("meeting_duration");
            $table->string("meeting_start_before");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('virtual_meetings');
    }
};
