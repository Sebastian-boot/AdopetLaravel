<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Vaccine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Animal::factory()
            ->count(15)
            ->hasAttached(
                Vaccine::factory()->count(3),
                [
                    'observations' => fake()->text(150),
                    'administered_by' => fake()->name()
                ]
            )
            ->create();
    }
}
