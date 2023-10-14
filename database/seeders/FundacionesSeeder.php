<?php

namespace Database\Seeders;

use App\Models\Fundaciones;
use Database\Factories\FundacionesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FundacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fundaciones::factory()->count(50)->create();
    }
}
