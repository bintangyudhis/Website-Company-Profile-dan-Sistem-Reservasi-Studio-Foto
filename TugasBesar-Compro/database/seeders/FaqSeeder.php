<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::truncate();

        $faqs = [
            // === LOKASI ===
            [
                'question' => 'di mana lokasi sejenak studio',
                'answer'   => '📍 Sejenak Studio berlokasi di Purwokerto, Jawa Tengah. Silakan hubungi kami di WhatsApp untuk alamat lengkapnya: 0812-3456-7890',
            ],
            [
                'question' => 'alamat sejenak studio',
                'answer'   => '📍 Sejenak Studio berlokasi di Purwokerto, Jawa Tengah. Hubungi kami di WhatsApp 0812-3456-7890 untuk info lokasi detail.',
            ],

            // === JAM BUKA ===
            [
                'question' => 'jam berapa studio buka',
                'answer'   => '🕘 Kami buka setiap hari pukul 10:00 – 21:00 WIB. Termasuk hari libur!',
            ],
            [
                'question' => 'jam operasional sejenak studio',
                'answer'   => '🕘 Jam operasional: Setiap hari pukul 10:00 – 21:00 WIB.',
            ],
            [
                'question' => 'apakah buka hari minggu',
                'answer'   => '✅ Ya, kami buka setiap hari termasuk Minggu dan hari libur nasional! Jam 10:00 – 21:00 WIB.',
            ],

            // === HARGA & PAKET ===
            [
                'question' => 'berapa harga foto di sejenak studio',
                'answer'   => "💰 Berikut daftar harga paket selfphoto kami:\n• Paket Berdua (2 orang) – Rp 35.000\n• Paket Senandung (4 orang) – Rp 50.000\n• Paket Memori (8 orang) – Rp 80.000\n• Paket Lembayung (8 orang) – Rp 100.000\n\nPenambahan: +10 menit Rp 20.000 | +1 orang Rp 10.000",
            ],
            [
                'question' => 'paket apa saja yang tersedia',
                'answer'   => "📦 Paket Selfphoto Sejenak Studio:\n1. Paket Berdua – Rp 35.000 (2 orang, 5 menit)\n2. Paket Senandung – Rp 50.000 (4 orang, 10 menit + 2 polaroid)\n3. Paket Memori – Rp 80.000 (8 orang, 10 menit + 6 polaroid)\n4. Paket Lembayung – Rp 100.000 (8 orang, 15 menit + 8 polaroid)",
            ],
            [
                'question' => 'harga paket berdua',
                'answer'   => '📸 Paket Berdua: Rp 35.000 untuk 2 orang, sesi 5 menit, 1 background pilihan, semua soft file dikirim via Google Drive.',
            ],
            [
                'question' => 'harga paket senandung',
                'answer'   => '📸 Paket Senandung: Rp 50.000 untuk 4 orang, sesi 10 menit, 1 background pilihan, soft file + 2 cetak foto polaroid.',
            ],
            [
                'question' => 'harga paket memori',
                'answer'   => '📸 Paket Memori: Rp 80.000 untuk 8 orang, sesi 10 menit, 1 background pilihan, soft file + 6 cetak foto polaroid.',
            ],
            [
                'question' => 'harga paket lembayung',
                'answer'   => '📸 Paket Lembayung: Rp 100.000 untuk 8 orang, sesi 15 menit, 1 background pilihan, soft file + 8 cetak foto polaroid.',
            ],

            // === BACKGROUND ===
            [
                'question' => 'background apa saja yang tersedia',
                'answer'   => "🖼️ Tersedia 4 pilihan background:\n1. White – Background putih bersih\n2. Elevator – Background bertema lift\n3. Red Box – Background merah/oranye mencolok\n4. Grey – Background abu-abu elegan\n\nSemua paket termasuk 1 pilihan background.",
            ],
            [
                'question' => 'pilihan background sejenak studio',
                'answer'   => "🖼️ Pilihan background kami:\n• White (Putih)\n• Elevator\n• Red Box (Merah)\n• Grey (Abu-abu)\n\nSatu sesi termasuk 1 background. Ganti background tambahan dikenakan biaya.",
            ],

            // === TAMBAHAN ===
            [
                'question' => 'biaya tambahan waktu dan orang',
                'answer'   => "➕ Biaya penambahan:\n• +10 menit sesi foto: Rp 20.000\n• +1 orang tambahan: Rp 10.000\n\nKonfirmasi langsung ke admin saat booking.",
            ],
            [
                'question' => 'apakah bisa tambah orang',
                'answer'   => '✅ Bisa! Penambahan 1 orang dikenakan biaya Rp 10.000. Konfirmasi ke admin saat reservasi.',
            ],
            [
                'question' => 'apakah bisa tambah waktu',
                'answer'   => '✅ Bisa! Penambahan waktu 10 menit dikenakan biaya Rp 20.000.',
            ],

            // === RESERVASI ===
            [
                'question' => 'bagaimana cara reservasi',
                'answer'   => "📝 Cara reservasi:\n1. Klik tombol 'Reservasi Sekarang' di website\n2. Isi nama, nomor HP, pilih paket & jadwal\n3. Submit — admin akan konfirmasi via WhatsApp",
            ],
            [
                'question' => 'cara booking selfphoto',
                'answer'   => '📝 Reservasi bisa melalui website ini (menu Reservasi) atau langsung hubungi WhatsApp: 0858-7805-9861',
            ],

            // === HASIL FOTO ===
            [
                'question' => 'hasil foto dikirim kemana',
                'answer'   => '📷 Semua soft file hasil edit foto dikirim melalui Google Drive ke nomor WhatsApp yang didaftarkan.',
            ],
            [
                'question' => 'berapa lama hasil foto jadi',
                'answer'   => '⏱️ Hasil foto biasanya siap dalam 1–3 hari kerja setelah sesi foto selesai.',
            ],

            // === KONTAK ===
            [
                'question' => 'kontak sejenak studio',
                'answer'   => "📞 Hubungi kami:\n• WhatsApp: 0858-7805-9861\n• Instagram: @sejenakselfphoto\n• Jam operasional: 10:00 – 21:00 WIB",
            ],
            [
                'question' => 'nomor whatsapp sejenak studio',
                'answer'   => '📱 WhatsApp Sejenak Studio: 0858-7805-9861 (Jam 10:00 – 21:00 WIB)',
            ],

            // === UMUM ===
            [
                'question' => 'terima kasih',
                'answer'   => '😊 Sama-sama! Jangan ragu bertanya lagi. Selamat menikmati sesi foto di Sejenak Studio! 📸',
            ],
            [
                'question' => 'halo',
                'answer'   => 'Halo! 👋 Ada yang bisa saya bantu seputar Sejenak Studio? Tanya soal paket, harga, background, atau reservasi ya!',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
