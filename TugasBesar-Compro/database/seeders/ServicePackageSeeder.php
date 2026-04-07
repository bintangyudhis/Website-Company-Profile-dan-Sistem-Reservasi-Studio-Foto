<?php

namespace Database\Seeders;

use App\Models\ServicePackage;
use Illuminate\Database\Seeder;

class ServicePackageSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks sementara agar bisa truncate
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ServicePackage::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $packages = [
            [
                'name'        => 'Paket Berdua',
                'description' => "– Maks 2 orang\n– Choose 1 Background\n– 5 menit sesi foto\n– All soft file edit foto\n– Send via Google Drive",
                'price'       => 35000,
                'max_people'  => 2,
                'image'       => null,
            ],
            [
                'name'        => 'Paket Senandung',
                'description' => "– Maks 4 orang\n– Choose 1 Background\n– 10 menit sesi foto\n– All soft file edit foto\n– Send via Google Drive\n– 2 cetak foto polaroid",
                'price'       => 50000,
                'max_people'  => 4,
                'image'       => null,
            ],
            [
                'name'        => 'Paket Memori',
                'description' => "– Maks 8 orang\n– Choose 1 Background\n– 10 menit sesi foto\n– All soft file edit foto\n– Send via Google Drive\n– 6 cetak foto polaroid",
                'price'       => 80000,
                'max_people'  => 8,
                'image'       => null,
            ],
            [
                'name'        => 'Paket Lembayung',
                'description' => "– Maks 8 orang\n– Choose 1 Background\n– 15 menit sesi foto\n– All soft file edit foto\n– Send via Google Drive\n– 8 cetak foto polaroid",
                'price'       => 100000,
                'max_people'  => 8,
                'image'       => null,
            ],
        ];

        foreach ($packages as $package) {
            ServicePackage::create($package);
        }
    }
}
