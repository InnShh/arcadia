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
            'name' => 'Test Admin',
            'email' => 'adm@example.test',
            'user_role_id' => User::ROLE_ADMIN,
            'password' => 'adm@example.test',
        ]);
        User::factory()->create([
            'name' => 'Test Employee',
            'email' => 'emp@example.test',
            'user_role_id' => User::ROLE_EMPLOYEE,
            'password' => 'emp@example.test',
        ]);
        User::factory()->create([
            'name' => 'Test Veterinary',
            'email' => 'vet@example.test',
            'user_role_id' => User::ROLE_VETERINARY,
            'password' => 'vet@example.test',
        ]);
        User::factory(2)->employee()->create();
        // User::factory(1)->veterinary()->create();
        $this->call([
            ExhibitSeeder::class,
            ReviewSeeder::class,
            VetoReportSeeder::class,
            FeedingReportSeeder::class,
        ]);
    }
}
