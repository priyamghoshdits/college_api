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
        Schema::create('item_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_type_id')->references('id')->on('item_types')->onDelete('cascade');
            $table->foreignId('inventory_item_id')->references('id')->on('inventory_items')->onDelete('cascade');
            $table->foreignId('item_supplier_id')->references('id')->on('item_suppliers')->onDelete('cascade');
            $table->foreignId('item_store_id')->references('id')->on('item_stores')->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('purchase_price');
            $table->date('purchase_date');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_stocks');
    }
};
