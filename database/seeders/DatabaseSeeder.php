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
            ['email' => 'kumejingdesa25@gmail.com'],
            [
                'name' => 'Admin Kumejing',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Initial Village Profile
        \App\Models\VillageProfile::updateOrCreate(
            ['id' => 1],
            [
                'history' => 'Sejarah Desa Kumejing...',
                'vision' => 'Visi Desa Kumejing...',
                'mission' => 'Misi Desa Kumejing...',
                'location_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15816.634621577969!2d109.9176342!3d-7.666063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e654eb68df6d9d1%3A0xe67c858e3f429b6!2sDesa%20Kumejing!5e0!3m2!1sen!2sid!4v1700000000000',
            ]
        );

        // Initial Population Stats
        \App\Models\PopulationStat::create(['label' => 'Total Penduduk', 'count' => 1500, 'category' => 'general']);
        \App\Models\PopulationStat::create(['label' => 'Laki-laki', 'count' => 740, 'category' => 'gender']);
        \App\Models\PopulationStat::create(['label' => 'Perempuan', 'count' => 760, 'category' => 'gender']);
    }
}
