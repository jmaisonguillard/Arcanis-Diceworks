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
        Schema::create('category_product', function (Blueprint $table) {
            $table->bigIncrements('id');  // Primary key for the pivot table
            $table->unsignedBigInteger('product_id');  // Foreign key for products
            $table->unsignedBigInteger('category_id');  // Foreign key for categories

            // Define foreign key constraints
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            // Optionally, you can add timestamps to track when the relationship was created or updated
            $table->timestamps();  // Optional but useful for future auditing
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_product');
    }
};
