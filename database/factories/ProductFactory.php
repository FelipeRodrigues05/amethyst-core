<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'product_name' => fake()->colorName(),
            'product_description' => fake()->paragraph(1),
            'product_price' => fake()->randomFloat(2),
            'image_url' => fake()->imageUrl(),
            'total_available' => fake()->randomNumber(),
            'total_selled' => fake()->randomNumber(),

            'company_id' => fake()->numberBetween(1, 10),
            'order_id' => fake()->numberBetween(1, 20),
        ];
    }
}
