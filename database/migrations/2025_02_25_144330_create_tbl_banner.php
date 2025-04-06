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
        Schema::create('tbl_banner', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('paragraph', 255);
            $table->string('banner_url', 100);
            $table->integer('sort_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_banner');
    }
};
