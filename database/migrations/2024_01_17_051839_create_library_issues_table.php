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
        Schema::create('library_issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->references('id')->on('library_stocks')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('quantity')->nullable(false);
            $table->integer('fine')->nullable(false);
            $table->integer("discount")->nullable(false);
            $table->date('issued_on')->nullable(false);
            $table->date('return_date')->nullable(false);
            $table->integer('returned')->default(0);
            $table->date('returned_on')->nullable(true);
            $table->foreignId('franchise_id')->references('id')->on('franchises')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_issues');
    }
};
