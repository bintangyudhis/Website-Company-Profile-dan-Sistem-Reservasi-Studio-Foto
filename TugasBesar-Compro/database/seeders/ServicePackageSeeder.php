<?php

namespace Database\Seeders;

use App\Models\ServicePackage;
use Illuminate\Database\Seeder;

class ServicePackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Graduation Studio',
                'description' => 'Paket foto wisuda indoor dengan 2 background dan 10 foto edit.',
                'price' => 150000,
                'max_people' => 5,
                'image' => 'graduation.jpg',
            ],
            [
                'name' => 'Group Photo',
                'description' => 'Foto grup bersama teman atau keluarga. Maksimal 10 orang.',
                'price' => 200000,
                'max_people' => 10,
                'image' => 'group.jpg',
            ],
            [
                'name' => 'Personal Portrait',
                'description' => 'Foto profil profesional atau personal branding.',
                'price' => 100000,
                'max_people' => 1,
                'image' => 'portrait.jpg',
            ],
            [
                'name' => 'Couple Session',
                'description' => 'Momen romantis bersama pasangan. 1 jam sesi foto.',
                'price' => 175000,
                'max_people' => 2,
                'image' => 'couple.jpg',
            ],
        ];

        foreach ($packages as $package) {
            ServicePackage::create($package);
        }
    }
}
