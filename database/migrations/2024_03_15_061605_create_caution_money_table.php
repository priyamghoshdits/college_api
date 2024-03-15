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
        Schema::create('caution_money', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('caution_money_payment_date')->nullable(true);
            $table->string('caution_money_mode_of_payment')->nullable(true);
            $table->string('caution_money_transaction_id')->nullable(true);
            $table->string('caution_money')->nullable(true);
            $table->string('refunded_amount')->nullable(true);
            $table->string('caution_money_deduction')->nullable(true);
            $table->string('refund_payment_date')->nullable(true);
            $table->string('refund_mode_of_payment')->nullable(true);
            $table->string('refund_transaction_id')->nullable(true);
            $table->integer('caution_money_refund')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caution_money');
    }
};
