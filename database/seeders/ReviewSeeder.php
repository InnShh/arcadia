<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Review::factory()->count(3)->create();
        Review::create([
            'pseudo' => 'Sarah',
            'comment' => 'I had a fantastic experience at Arcadia Zoo! The enclosures are spacious and beautifully designed, and it\'s clear the animals are well cared for. The staff is knowledgeable and friendly, making the visit even more enjoyable. I especially loved the Savanna exhibit with the giraffes and lions. Definitely worth to visit!',
            'rating' => 3,
            'created_at' => '2024-01-20 00:00:00',
            'approved' => true,
        ]);

        Review::create([
            'pseudo' => 'John',
            'comment' => 'I had a fantastic experience at Arcadia Zoo! The enclosures are spacious and beautifully designed, and it\'s clear the animals are well cared for. The staff is knowledgeable and friendly, making the visit even more enjoyable. I especially loved the Savanna exhibit with the giraffes and lions. Definitely worth to visit!',
            'rating' => 4,
            'created_at' => '2023-11-05 00:00:00',
            'approved' => true,
        ]);

        Review::create([
            'pseudo' => 'Bob',
            'comment' => 'I had a fantastic experience at Arcadia Zoo! The enclosures are spacious and beautifully designed, and it\'s clear the animals are well cared for. The staff is knowledgeable and friendly, making the visit even more enjoyable. I especially loved the Savanna exhibit with the giraffes and lions. Definitely worth to visit!',
            'rating' => 2,
            'created_at' => '2024-02-23 00:00:00',
            'approved' => null,
        ]);

        Review::create([
            'pseudo' => 'Alice',
            'comment' => 'I had a fantastic experience at Arcadia Zoo! The enclosures are spacious and beautifully designed, and it\'s clear the animals are well cared for. The staff is knowledgeable and friendly, making the visit even more enjoyable. I especially loved the Savanna exhibit with the giraffes and lions. Definitely worth to visit!',
            'rating' => 1,
            'created_at' => '2023-01-21 00:00:00',
            'approved' => false,
        ]);
    }
}
