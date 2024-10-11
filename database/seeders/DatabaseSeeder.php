<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('secret')
        ]);

        User::factory()->create([
            'name' => 'Julian Miller',
            'email' => 'jdavmiller90@gmail.com',
            'password' => bcrypt('secret')
        ]);

        // Create categories
        $categories = Category::factory()->count(10)->create();

        // Create tags
        $tags = Tag::factory()->count(10)->create();

        // Create products and associate each one with random categories
        Product::factory()->count(20)->create()->each(function ($product) use ($categories, $tags) {
            $product->categories()->attach($categories->random(2));  // Attach 2 random categories to each product
            // Attach 3 random tags to each product
            $product->tags()->attach($tags->random(3));
        });

        // Call the color and product color seeders
        $this->call([
            ColorSeeder::class,
            ProductColorSeeder::class,
        ]);
    }
}
