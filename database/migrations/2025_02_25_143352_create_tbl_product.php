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
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->string('sku_code', 50);
            $table->string('sku_name', 100);
            $table->string('price', 255)->nullable();
            $table->string('main_picture_url', 255)->nullable();
            $table->text('detail_desc')->nullable();
            $table->boolean('is_top_product')->default(0);
            $table->boolean('is_discontinue')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_product');
    }
};
