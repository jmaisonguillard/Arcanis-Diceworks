<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(2, true);  // Generate a unique category name
        $slug = Str::slug($name);  // Generate a slug from the category name

        return [
            'name' => $name,  // Category name
            'slug' => $slug,  // Slug based on the category name
            'description' => $this->faker->sentence,  // Optional description for the category
            'parent_id' => null,  // This can be updated later if you want to create child categories
            'is_active' => $this->faker->boolean(80),  // 80% chance the category is active
        ];
    }

    /**
     * State for assigning a parent category.
     */
    public function withParent(Category $parentCategory)
    {
        return $this->state(function () use ($parentCategory) {
            return ['parent_id' => $parentCategory->id];
        });
    }
}
