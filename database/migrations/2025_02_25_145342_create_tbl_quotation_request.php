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
        Schema::create('tbl_quotation_request', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('company_name', 255)->nullable();
            $table->string('industry', 255)->nullable();
            $table->string('email', 100);
            $table->string('phone_number', 100);
            $table->string('message', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_quotation_request');
    }
};
