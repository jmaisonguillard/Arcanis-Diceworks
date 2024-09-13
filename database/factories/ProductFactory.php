<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(3, true);  // Generate a unique product name
        $slug = Str::slug($name);  // Generate a slug from the product name

        return [
            'name' => $name,  // Product name
            'slug' => $slug,  // SEO-friendly slug
            'description' => $this->faker->paragraph,  // Product description
            'price' => $this->faker->numberBetween(5, 90),  // Random price between 10 and 200
            'stock_quantity' => $this->faker->numberBetween(1, 100),  // Random stock quantity
            'is_customizable' => $this->faker->boolean(50),  // 50% chance that the product is customizable
            'is_limited_edition' => $this->faker->boolean(20),  // 20% chance that the product is a limited edition
            'meta_title' => $name,  // Optional SEO meta title
            'meta_description' => $this->faker->sentence,  // Optional SEO meta description
        ];
    }

    /**
     * State for associating the product with a category.
     */
    public function withCategory(Category $category)
    {
        return $this->afterCreating(function (Product $product) use ($category) {
            $product->categories()->attach($category);
        });
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            // List of possible image paths
            $images = [
                storage_path('app/seeds/shutterstock_1683945388.png'),
                storage_path('app/seeds/shutterstock_1685144872.png'),
                storage_path('app/seeds/shutterstock_1686515932.png'),
                storage_path('app/seeds/shutterstock_1692760576.png')
            ];

            // Randomly select one image from the array
            $image = $this->faker->randomElement($images);

            // Attach the randomly selected image to the product
            $product->addMedia($image)
                ->preservingOriginal()
                ->toMediaCollection('images');
        });
    }
}
