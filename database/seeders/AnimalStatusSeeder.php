<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\AnimalStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalStatusSeeder extends Seeder
{
    /**
     * List of states
     */
    const STATUS = [
        'ABANDONED',
        'IN_RECOVERY',
        'IN_RESCUE',
        'SICK',
        'POSSIBLE_DEATH',
        'ADOPTED',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach (self::STATUS as $s) {
            AnimalStatus::create([
                'name' => $s
            ]);
        }
    }
}
