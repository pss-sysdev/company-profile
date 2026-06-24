<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotation_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('name');
            $table->string('category');
            $table->string('company_name');
            $table->string('industry')->nullable();
            $table->string('contact_number', 50);
            $table->string('email');
            $table->date('request_date');
            $table->text('message');
            $table->string('status', 50)->default('new');
            $table->boolean('admin_email_sent')->default(false);
            $table->boolean('customer_email_sent')->default(false);
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotation_requests');
    }
};
