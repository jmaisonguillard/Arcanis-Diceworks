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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('stock_quantity');
            $table->string('sku')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->boolean('is_customizable')->default(false);
            $table->json('custom_options')->nullable();
            $table->json('variants')->nullable();
            $table->boolean('is_limited_edition')->default(false);
            $table->timestamp('release_date')->nullable();
            $table->timestamp('end_of_sale_date')->nullable();
            $table->integer('max_quantity_per_customer')->nullable();
            $table->string('image_path')->nullable();
            $table->json('gallery_images')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->decimal('shipping_weight', 8, 2)->nullable();
            $table->boolean('allow_backorders')->default(false);
            $table->timestamp('restock_date')->nullable();
            $table->integer('discount_percentage')->nullable();
            $table->timestamp('discount_start_date')->nullable();
            $table->timestamp('discount_end_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('stripe_product_id')->nullable();
            $table->string('stripe_price_id')->nullable();
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
