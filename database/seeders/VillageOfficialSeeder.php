<?php

namespace Database\Seeders;

use App\Models\VillageOfficial;
use Illuminate\Database\Seeder;

class VillageOfficialSeeder extends Seeder
{
    public function run(): void
    {
        $officials = [
            ['name' => 'NICAM SEBASTIAN', 'position' => 'KEPALA DESA', 'photo' => 'officials/nicam-sebastian.jpg', 'order' => 1],
            ['name' => 'SALIMIN, S.Pd.I', 'position' => 'SEKRETARIS DESA', 'photo' => 'officials/salimin.jpg', 'order' => 2],
            ['name' => 'NURJANAH, S.KM', 'position' => 'KASIE PEMERINTAHAN', 'photo' => 'officials/nurjanah.jpg', 'order' => 3],
            ['name' => 'SAMINGAN', 'position' => 'KASIE KESEJAHTERAAN', 'photo' => 'officials/samingan.jpg', 'order' => 4],
            ['name' => 'SARIYEM', 'position' => 'KASIE PELAYANAN', 'photo' => 'officials/sariyem.jpg', 'order' => 5],
            ['name' => 'MUHLATIF', 'position' => 'KAUR KEUANGAN', 'photo' => 'officials/muhlatif.jpg', 'order' => 6],
            ['name' => 'SUBHAN', 'position' => 'KAUR TATA USAHA DAN UMUM', 'photo' => 'officials/subhan.jpg', 'order' => 7],
            ['name' => 'HABIDIN', 'position' => 'KAUR PERENCANAAN', 'photo' => 'officials/habidin.jpg', 'order' => 8],
            ['name' => 'SLAMET', 'position' => 'KADUS BRONDONG', 'photo' => 'officials/slamet.jpg', 'order' => 9],
            ['name' => 'USWATUN HASANAH', 'position' => 'KADUS KEDUNG BULU', 'photo' => 'officials/uswatun-hasanah.jpg', 'order' => 10],
            ['name' => 'AHMAD', 'position' => 'KADUS REJOSARI', 'photo' => 'officials/ahmad.jpg', 'order' => 11],
            ['name' => 'MUHKAMIL', 'position' => 'KADUS KIRINGAN', 'photo' => 'officials/muhkamil.jpg', 'order' => 12],
            ['name' => 'YOGA ADITIA', 'position' => 'STAF', 'photo' => 'officials/yoga-aditia.jpg', 'order' => 13],
            ['name' => 'AKHMAD ZAINUDIN', 'position' => 'STAF', 'photo' => 'officials/akhmad-zainudin.jpg', 'order' => 14],
        ];

        foreach ($officials as $official) {
            VillageOfficial::updateOrCreate(
                ['name' => $official['name']],
                $official
            );
        }
    }
}
