<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Di mana lokasi Sejenak Studio?',
                'answer' => 'Sejenak Studio berlokasi di Purwokerto, Jawa Tengah. Alamat lengkapnya adalah Jl. HR Bunyamin No. 123.',
            ],
            [
                'question' => 'Jam berapa studio buka?',
                'answer' => 'Kami buka setiap hari mulai pukul 09:00 hingga 21:00 WIB.',
            ],
            [
                'question' => 'Bagaimana cara melakukan reservasi?',
                'answer' => 'Anda bisa melakukan reservasi langsung melalui website ini pada menu Reservasi atau hubungi kami via WhatsApp.',
            ],
            [
                'question' => 'Apakah bisa foto outdoor?',
                'answer' => 'Saat ini kami fokus pada layanan studio indoor, namun kami juga melayani paket outdoor berdasarkan permintaan khusus.',
            ],
            [
                'question' => 'Berapa lama proses edit foto?',
                'answer' => 'Proses editing biasanya memakan waktu 3-5 hari kerja tergantung pada paket yang dipilih.',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
