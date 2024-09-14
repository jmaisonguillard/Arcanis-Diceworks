<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Stripe\Stripe;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['name', 'slug', 'description', 'price', 'stock_quantity', 'is_customizable', 'is_limited_edition', 'meta_title', 'meta_description'];

    // Boot method for the Product model
    protected static function boot()
    {
        parent::boot();

        // Hook into the created event to create a Stripe product
        static::created(function ($product) {
            $product->createStripeProduct();
        });
    }

    /**
     * Define media conversions like thumbnails or previews.
     */
    public function registerMediaConversions(\Spatie\MediaLibrary\Conversions\Registrar|\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232);

        $this->addMediaConversion('preview')
            ->width(800)
            ->height(600);
    }

    /**
     * Scope to get the two newest products.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNewest($query)
    {
        return $query->orderBy('created_at', 'desc')->take(2);
    }

    /**
     * Relationship: A product can belong to many categories.
     */
    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get recommended products based on the current product's category and tags.
     *
     * @param  int $limit  Number of recommended products to return
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function recommended($limit = 5)
    {
        // Step 1: Get the tags of the current product
        $tagIds = $this->tags->pluck('id'); // Get the current product's tag IDs

        // Step 2: Find products that share any of these tags
        $recommendedProducts = Product::whereHas('tags', function ($query) use ($tagIds) {
            $query->whereIn('tags.id', $tagIds);
        })
            ->where('id', '!=', $this->id) // Exclude the current product
            ->withCount(['tags' => function ($query) use ($tagIds) {
                // Step 3: Count the number of matching tags for each product
                $query->whereIn('tags.id', $tagIds);
            }])
            ->orderBy('tags_count', 'desc') // Step 4: Prioritize products with the most matching tags
            ->take($limit) // Limit the results
            ->get();

        // Step 5: If no tag-based recommendations, fall back to random products
        if ($recommendedProducts->isEmpty()) {
            $recommendedProducts = Product::where('id', '!=', $this->id) // Exclude current product
            ->inRandomOrder() // Random order
            ->take($limit) // Limit the results
            ->get();
        }

        return $recommendedProducts;
    }

    public function createStripeProduct()
    {
        // Set the Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Step 1: Create a product in Stripe
            $stripeProduct = \Stripe\Product::create([
                'name' => $this->name,
                'description' => $this->description,
            ]);

            // Step 2: Create a price in Stripe
            $stripePrice = \Stripe\Price::create([
                'product' => $stripeProduct->id,
                'unit_amount' => $this->price * 100, // Price in cents
                'currency' => 'usd', // Set your desired currency
            ]);

            // Step 3: Save the Stripe product and price IDs to the database
            $this->update([
                'stripe_product_id' => $stripeProduct->id,
                'stripe_price_id' => $stripePrice->id,
            ]);

        } catch (\Exception $e) {
            // Handle error if Stripe product creation fails
            \Log::error('Stripe Product Creation Failed: ' . $e->getMessage());
        }
    }

    protected function primaryPhoto() : Attribute {
        return Attribute::make(
            get: fn() => $this->getMedia('*')[0]->getUrl(),
        );
    }
}
