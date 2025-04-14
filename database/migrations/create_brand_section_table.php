<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('brand_section', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id'); // Foreign key to 'brand' table

            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('is_show_brand_product')->default(1);

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('brand_id')
                ->references('id')->on('brand')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('brand_section');
    }
}
