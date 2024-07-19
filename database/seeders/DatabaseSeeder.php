<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'user_role_id' => 1,
            'password' => 'test@example.com',
        ]);
        User::factory(3)->employee()->create();
        User::factory(1)->veterinary()->create();
        $this->call([
            ReviewSeeder::class,
            VetoReportSeeder::class,
            FeedingReportSeeder::class,
        ]);
    }
}
