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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('leave_type_id')->references('id')->on('leave_types')->onDelete('cascade');
            $table->date('from_date')->nullable(false);;
            $table->date('to_date')->nullable(false);;
            $table->string("total_days")->nullable(false);
            $table->string('reason');
            $table->integer('approved')->default(0);
            $table->integer('approved_by')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
