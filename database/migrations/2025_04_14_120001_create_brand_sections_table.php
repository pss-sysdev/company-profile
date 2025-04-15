<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandSectionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('brand_section', function (Blueprint $table) {
            $table->id(); // id for this table (auto-increment)
            $table->integer('brand_id'); // matches int(11) in `brand.id`

            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('is_show_brand_product')->default(1);

            $table->timestamps();

            // Foreign key constraint (NO UNSIGNED)
            $table->foreign('brand_id')
                ->references('id')
                ->on('brand')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_section');
    }
}