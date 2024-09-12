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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Category name (e.g., "Resin Dice")
            $table->string('slug')->unique();  // SEO-friendly URL slug (e.g., "resin-dice")
            $table->text('description')->nullable();  // Optional category description
            $table->unsignedBigInteger('parent_id')->nullable();  // Parent category for nested categories
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
            $table->boolean('is_active')->default(true);  // Toggle category visibility
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
