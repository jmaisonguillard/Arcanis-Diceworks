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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Customer details (name, email, etc.)
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();

            // Order status and payment fields
            $table->string('status')->default('pending');  // 'pending', 'processing', 'completed'
            $table->string('payment_status')->default('unpaid');  // 'paid', 'unpaid'
            $table->string('payment_method')->nullable();  // 'stripe', 'paypal', etc.
            $table->string('stripe_payment_id')->nullable();  // Stripe payment ID
            $table->decimal('total_price', 10, 2);  // Total price
            $table->decimal('shipping_cost', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
