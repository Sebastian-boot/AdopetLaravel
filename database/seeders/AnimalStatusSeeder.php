<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\AnimalStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            'ABANDONED',
            'IN_RECOVERY',
            'IN_RESCUE',
            'SICK',
            'POSSIBLE_DEATH',
            'ADOPTED',
        ];
        foreach ($status as $s) {
            AnimalStatus::create([
                'name' => $s
            ]);
        }
    }
}
