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
        Schema::create('inventory_issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_type_id')->references('id')->on('user_types')->onDelete('cascade');
            $table->foreignId('issue_to')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('issue_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('item_type_id')->references('id')->on('item_types')->onDelete('cascade');
            $table->foreignId('inventory_item_id')->references('id')->on('inventory_items')->onDelete('cascade');
            $table->integer('quantity');
            $table->date('issue_date');
            $table->date('return_date');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_issues');
    }
};
