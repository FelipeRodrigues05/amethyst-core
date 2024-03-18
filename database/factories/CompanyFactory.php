<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->company(),
            'company_document' => fake()->cnpj(false),
            'company_phone' => fake()->phoneNumber(),
            'company_email' => fake()->companyEmail(),
            'company_type' => fake()->randomElement(['pf', 'pj']),
            'product_id' => fake()->numberBetween(1, 10),
            'employee_id' => fake()->numberBetween(1, 10)
        ];
    }
}
