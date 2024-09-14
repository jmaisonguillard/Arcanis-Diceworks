<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'customer_name', 'customer_email', 'customer_phone', 'shipping_address', 'city',
        'postal_code', 'country', 'status', 'payment_status', 'payment_method', 'total_price', 'shipping_cost',
        'stripe_payment_id', 'billing_details', 'shipping_details', 'receipt_url'
    ];

    protected $casts = [
        'billing_details' => 'json',
        'shipping_details' => 'json',
    ];

    /**
     * Define the relationship between an Order and its items.
     */
    public function orderItems(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Define the relationship between an Order and a User.
     * An order may or may not be tied to a registered user.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
