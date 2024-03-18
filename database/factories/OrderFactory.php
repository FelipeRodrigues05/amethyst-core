<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_name' => fake()->name(),
            'customer_address' => fake()->address(),
            'customer_phone' => fake()->phoneNumber(),

            'order_status' => fake()->randomElement([
                'order_placed',
                'pending_confirmation',
                'waiting_payment',
                'payment_confirmed',
                'order_shipped',
                'delivered',
            ]),
            'product_id' => fake()->numberBetween(1, 10),
        ];
    }
}
