<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductColor extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'color_product';  // Make sure this points to the pivot table

    protected $fillable = ['product_id', 'color_id', 'quantity', 'price'];

    // Define relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    // You can customize the media collection if needed
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('color_images')
            ->useDisk('public')  // Optionally specify the disk
            ->singleFile();  // Only allow one image per color
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->getMedia('*')[0]->getUrl(),
        );
    }
}

