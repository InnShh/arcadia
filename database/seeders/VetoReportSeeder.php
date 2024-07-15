<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\User;
use App\Models\VetoReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VetoReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all animal IDs
        $animalIds = Animal::pluck('id')->toArray();

        // Shuffle the animal IDs and take half of them
        $halfAnimalIds = collect($animalIds)->shuffle()->take(floor(count($animalIds) / 2));

        // Generate reports for the selected animals
        foreach ($halfAnimalIds as $animalId) {
            // Generate 1 to 3 reports for each animal
            VetoReport::factory()->count(rand(1, 3))->create([
                'animal_id' => $animalId,
                'user_id' => User::inRandomOrder()->first()->id, // Assuming you already have users in your database
            ]);
        }
    }
}
