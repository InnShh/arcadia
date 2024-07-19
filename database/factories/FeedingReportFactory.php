<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeedingReport>
 */
class FeedingReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->employee(),
            'animal_id' => $this->faker->numberBetween(1, 9),
            'food' => $this->faker->word,
            'food_vol' => $this->faker->numberBetween(50, 1000),
            'details' => $this->faker->sentence,
        ];
    }
}
