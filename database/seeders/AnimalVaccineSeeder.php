<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Vaccine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalVaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animals = Animal::all();
        $vaccines = Vaccine::all();

        $animals->each(function($animal) use($vaccines) {
            $animal->vaccines()->attach($vaccines->random()->id);
        });

    }
}
