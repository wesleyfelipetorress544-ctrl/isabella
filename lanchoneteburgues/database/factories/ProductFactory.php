<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
        $category = fake()->randomElement(array_keys(Product::CATEGORIES));

        return [
            'name' => fake()->words(2, true),
            'category' => $category,
            'burger_type' => $category === 'lanches'
                ? fake()->randomElement(array_keys(Product::BURGER_TYPES))
                : null,
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 1, 80),
            'image_path' => 'products/example.jpg',
        ];
    }
}
