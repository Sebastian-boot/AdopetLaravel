<?php

namespace Database\Factories;

use App\Models\AnimalStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define an array of colors
     *
     * @var array<string>
     */
    const COLORS = [
        'Red', 'Blue', 'Green', 'Yellow', 'Black',
        'White', 'Orange', 'Purple', 'Pink', 'Brown',
        'Gray',
    ];

     /**
     * Define an array of breeds or types of animals
     *
     * @var array<string>
     */
    const BREED_TYPE = [
        'Bulldog', 'Labrador Retriever', 'Golden Retriever', 'German Shepherd',
        'Poodle', 'Beagle', 'Boxer', 'Rottweiler', 'Dachshund', 'Siberian Husky',
        'Great Dane', 'Pug',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = AnimalStatus::all();

        return [
            'name' => fake()->name(),
            'age' => fake()-> numberBetween(2, 8),
            'gender' => fake()->randomElement(['M', 'F']),
            'coat_color' =>fake()->randomElement(self::COLORS),
            'weight' => fake()->randomFloat(2, 0.1, 100.0),
            'height' => fake()->randomFloat(2, 0.1, 100.0),
            'breed_or_type' => fake()->randomElement(self::BREED_TYPE),
            'rescue_history' => fake()->text(100),
            'rescue_date' => fake()->date(),
            'health_condition' => fake()->text(100),
            'rescue_place' => fake()->city() . "-" . fake()->address(),
            'animal_status_id' => $status->random()->id,
        ];
    }
}
