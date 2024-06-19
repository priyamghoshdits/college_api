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
        Schema::create('member_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreignId('designation_id')->references('id')->on('designations')->onDelete('cascade');
            $table->date("date_of_joining")->nullable(true);
            $table->string("material_status")->nullable(true);
            $table->string("work_experience")->nullable(true);
            $table->string("emergency_phone_number")->nullable(true);
            $table->string("qualification")->nullable(true);
            $table->string("epf_number")->nullable(true);
            $table->string("current_address")->nullable(true);
            $table->string("permanent_address")->nullable(true);
            $table->string("gross_salary")->nullable(true);
            $table->string("location")->nullable(true);
            $table->string("contract_type")->nullable(true);
            $table->string("bank_account_number")->nullable(true);
            $table->string("bank_name")->nullable(true);
            $table->string("ifsc_code")->nullable(true);
            $table->string("bank_branch_name")->nullable(true);

            $table->string("pan_number")->nullable(true);
            $table->string("pan_proof")->nullable(true);
            $table->string("caste_certificate_proof")->nullable(true);
            $table->string("joining_letter_proof")->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_details');
    }
};
