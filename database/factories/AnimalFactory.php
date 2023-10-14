<?php

namespace Database\Factories;

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

    const ADDRESS = [
        '123 Calle Ficticia',
        '456 Avenida Imaginaria',
        '789 Carrera Inventada',
        '1010 Camino de la Ilusión',
        '222 Ruta Irreal',
        '333 Boulevard de la Imaginación',
        '444 Plaza de los Sueños',
        '555 Paseo de la Fantasía',
        '666 Carretera de la Imaginación',
        '777 Avenida de los Deseos',
        '888 Callejón de la Utopía',
        '999 Avenida de los Suenos',
        '1001 Callejuela de los Pensamientos',
        '1111 Pasaje de los Anhelos',
        '1212 Carretera de los Sueños',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'age' => fake()-> numberBetween(2, 8),
            'gender' => fake()->randomElement(['M', 'H']),
            'coatColor' =>fake()->randomElement(self::COLORS),
            'weight' => fake()->randomFloat(2, 0.1, 100.0),
            'height' => fake()->randomFloat(2, 0.1, 100.0),
            'breed_or_type' => fake()->randomElement(self::BREED_TYPE),
            'rescue_story' => fake()->text(100),
            'rescue_date' => fake()->date(),
            'health_condition' => fake()->text(100),
            'rescue_place' => fake()->randomElement(self::ADDRESS)
        ];
    }
}
