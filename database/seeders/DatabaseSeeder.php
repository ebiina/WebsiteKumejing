<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'kumejing2026@gmail.com'],
            [
                'name' => 'Admin Kumejing',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Run specialized seeders
        $this->call([
            VillageProfileSeeder::class,
            VillageOfficialSeeder::class,
            PopulationStatSeeder::class,
        ]);
    }
}
