<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fundaciones>
 */
class FundacionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'introduction' => fake()->text(100),
            'history' => fake()->text(100),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'website' => fake()->url(),
            'nit' => fake()->numerify('########'),
            'employeeCount' => fake()->numberBetween(1, 100),
            'FoundationFoundingDate' => fake()->date(),
            'animalsAssitedCount' => fake()->numberBetween(1, 1000),
            'currentAnimalAssitedCount' => fake()->numberBetween(1, 500),
            'limitAnimalAssitedCount' => fake()->numberBetween(1, 1000),
            'foundationrating' => fake()->numberBetween(1, 5),
        ];
    }
}
