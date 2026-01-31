<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PopulationStat;

class PopulationStatSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing stats to avoid duplicates
        PopulationStat::truncate();

        $stats = [
            // Umum
            ['category' => 'Umum', 'label' => 'Total Penduduk', 'count' => 2986],
            ['category' => 'Umum', 'label' => 'Total Kepala Keluarga', 'count' => 963],
            
            // Jenis Kelamin
            ['category' => 'Jenis Kelamin', 'label' => 'Laki-laki', 'count' => 1525],
            ['category' => 'Jenis Kelamin', 'label' => 'Perempuan', 'count' => 1462],
            
            // Kepala Keluarga
            ['category' => 'Kepala Keluarga', 'label' => 'Kepala Keluarga Laki-laki', 'count' => 836],
            ['category' => 'Kepala Keluarga', 'label' => 'Kepala Keluarga Perempuan', 'count' => 127],
            
            // Kelompok Umur
            ['category' => 'Kelompok Umur', 'label' => '0-3 Tahun', 'count' => 72],
            ['category' => 'Kelompok Umur', 'label' => '3-6 Tahun', 'count' => 144],
            ['category' => 'Kelompok Umur', 'label' => '7-12 Tahun', 'count' => 276],
            ['category' => 'Kelompok Umur', 'label' => '13-15 Tahun', 'count' => 149],
            ['category' => 'Kelompok Umur', 'label' => '16-18 Tahun', 'count' => 145],
            ['category' => 'Kelompok Umur', 'label' => '19-59 Tahun', 'count' => 1736],
            ['category' => 'Kelompok Umur', 'label' => '60 Tahun ke Atas', 'count' => 465],
        ];

        foreach ($stats as $stat) {
            PopulationStat::create($stat);
        }
    }
}
