<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;  // Import Faker

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Initialize Faker
        $faker = Faker::create();

        // Fetch all colors
        $colors = Color::all();

        // Fetch some products (assuming you already have some products in your database)
        $products = Product::all();

        // Define the images to be randomly assigned
        $images = [
            storage_path('app/seeds/shutterstock_1683945388.png'),
            storage_path('app/seeds/shutterstock_1685144872.png'),
            storage_path('app/seeds/shutterstock_1686515932.png'),
            storage_path('app/seeds/shutterstock_1692760576.png')
        ];

        // Assign colors to each product with random quantities and prices
        foreach ($products as $product) {
            foreach ($colors->random(3) as $color) {  // Assign 3 random colors to each product
                // Create the ProductColor entry
                $productColor = ProductColor::create([
                    'product_id' => $product->id,
                    'color_id' => $color->id,
                    'quantity' => rand(10, 100),  // Random quantity between 10 and 100
                    'price' => $product->price + rand(1, 20),  // Random price adjustment
                ]);

                // Randomly select one image from the array
                $image = $faker->randomElement($images);

                // Attach the randomly selected image to the product color using Spatie Media Library
                $productColor->addMedia($image)
                    ->preservingOriginal()
                    ->toMediaCollection('color_images');  // Store the image in 'color_images' collection
            }
        }
    }
}
