<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Gallery::truncate();
        
        $galleries = [
            // Paket Berdua
            ['title' => 'Bestie Pose', 'category' => 'Berdua', 'image' => 'default.png'],
            ['title' => 'Couple Portrait', 'category' => 'Berdua', 'image' => 'default.png'],
            
            // Paket Senandung
            ['title' => 'Family Fun', 'category' => 'Senandung', 'image' => 'default.png'],
            ['title' => 'Double Date', 'category' => 'Senandung', 'image' => 'default.png'],
            
            // Paket Memori
            ['title' => 'Squad Goals', 'category' => 'Memori', 'image' => 'default.png'],
            ['title' => 'Office Team', 'category' => 'Memori', 'image' => 'default.png'],
            
            // Paket Lembayung
            ['title' => 'Big Family', 'category' => 'Lembayung', 'image' => 'default.png'],
            ['title' => 'Classmate Reunion', 'category' => 'Lembayung', 'image' => 'default.png'],
        ];

        foreach ($galleries as $gallery) {
            \App\Models\Gallery::create($gallery);
        }
    }
}
