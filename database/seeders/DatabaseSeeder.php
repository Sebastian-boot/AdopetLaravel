<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(AnimalStatusSeeder::class);
        $this->call(AnimalSeeder::class);
        $this->call(FundacionesSeeder::class);
<<<<<<< HEAD


=======
>>>>>>> 0041900aa34397091c49c53069881c9a3af431ce
    }
}
