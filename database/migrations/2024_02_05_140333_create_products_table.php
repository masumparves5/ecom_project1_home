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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('brand_id');
            $table->integer('unit_id');
            $table->string('name');
            $table->string('code');
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('regular_price')->nullable();
            $table->text('selling_price')->nullable();
            $table->text('stock_amount')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('featured_status')->default(0);
            $table->tinyInteger('trending_status')->default(0);
            $table->tinyInteger('sales_count')->default(0);
            $table->tinyInteger('hit_count')->default(0);
            $table->text('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
