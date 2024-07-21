<?php

namespace Database\Seeders;

use App\Models\Exhibit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExhibitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exhibits = Exhibit::all();
        foreach ($exhibits as $exhibit) {
            if ($exhibits->last() !== $exhibit) {
                $exhibit->state_at = fake()->datetime();
                $exhibit->state = fake()->paragraph;
                $exhibit->save();
            }
        }
    }
}
