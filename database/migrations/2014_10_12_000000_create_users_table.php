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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('identification_no')->nullable(true);
            $table->string('first_name',50)->nullable(false);
            $table->string('middle_name',50)->nullable(true);
            $table->string('last_name',50)->nullable(false);
            $table->string('gender',50)->nullable(true);
            $table->string('dob',50)->nullable(true);
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('religion',50)->nullable(true);
            $table->string('mobile_no',50)->nullable(true);
            $table->string('image',50)->nullable(true);
            $table->string('blood_group',30)->nullable(true);
            $table->string('commission_flat',30)->nullable(true);
            $table->string('commission_percentage',30)->nullable(true);
            $table->foreignId('user_type_id')->references('id')->on('user_types')->onDelete('cascade');
            $table->foreignId('franchise_id')->references('id')->on('franchises')->onDelete('cascade');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('status')->default(1); //1 for unblocked 0 for blocked
//            //0 for pre-admission 1 for admitted 2 for passed 3 left
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
