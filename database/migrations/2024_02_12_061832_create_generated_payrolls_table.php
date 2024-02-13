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
        Schema::create('generated_payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('month')->nullable(false);
            $table->string('year')->nullable(false);
            $table->integer('basic_salary')->nullable(false);
            $table->integer('gross_salary')->nullable(false);
            $table->integer('net_salary')->nullable(false);
            $table->integer('total_present')->nullable(false);
            $table->integer('total_absent')->nullable(false);
            $table->integer('total_leave')->nullable(false);
            $table->integer('deduction')->default(0);
            $table->integer('tax')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generated_payrolls');
    }
};
