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
        Schema::create('tbl_company_profile', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('overview', 100);
            $table->string('about', 100);
            $table->string('motto', 255);
            $table->string('vision', 500);
            $table->string('mission', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_company_profile');
    }
};
