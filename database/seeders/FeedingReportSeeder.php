<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\FeedingReport;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedingReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animalIds = Animal::pluck('id')->toArray();

        $halfAnimalIds = collect($animalIds)->shuffle()->take(floor(count($animalIds) / 2));

        foreach ($halfAnimalIds as $animalId) {
            FeedingReport::factory()->count(rand(1, 3))->create([
                'animal_id' => $animalId,
                'user_id' => User::employee()->inRandomOrder()->first()->id,
            ]);
        }
    }
}
