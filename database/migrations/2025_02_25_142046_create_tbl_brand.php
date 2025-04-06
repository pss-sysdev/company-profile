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
        Schema::create('tbl_brand', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable(false);
            $table->string('logo_picture', 555)->nullable();
            $table->string('logo_picture2', 555)->nullable();
            $table->string('banner_picture', 555)->nullable();
            $table->string('bg_logo_picture', 555)->nullable();
            $table->boolean('is_own')->default(0);
            $table->string('url', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_brand');
    }
};
