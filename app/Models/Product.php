<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['name', 'slug', 'description', 'price', 'stock_quantity', 'is_customizable', 'is_limited_edition', 'meta_title', 'meta_description'];

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

}
