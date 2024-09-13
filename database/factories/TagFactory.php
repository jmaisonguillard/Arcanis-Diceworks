<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word;  // Generate a unique single word tag
        $slug = Str::slug($name);

        return [
            'name' => ucfirst($name),  // Capitalize the first letter of the tag name
            'slug' => $slug,  // Generate slug from tag name
        ];
    }
}
