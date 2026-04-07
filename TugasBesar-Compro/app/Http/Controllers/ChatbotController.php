<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    /**
     * Tampilkan halaman chat room.
     */
    public function index()
    {
        return view('chatbot');
    }

    /**
     * Menangani pesan dari user dan membalas menggunakan algoritma Levenshtein.
     *
     * Cara kerja:
     * 1. Tangkap input user, normalisasi ke huruf kecil
     * 2. Cek apakah itu sapaan (halo, hai, dll.)
     * 3. Loop semua FAQ di database
     * 4. Hitung skor kemiripan gabungan:
     *    - 50% dari Levenshtein string penuh (dinormalisasi 0-1)
     *    - 50% dari kecocokan per kata (word overlap)
     * 5. Pilih FAQ dengan skor tertinggi
     * 6. Jika skor >= threshold (0.3 = 30%), tampilkan jawabannya
     * 7. Jika tidak ada yang cocok, tampilkan pesan fallback
     */
    public function handle(Request $request)
    {
        $input = trim(strtolower($request->input('message', '')));

        // Jika input kosong
        if (empty($input)) {
            return response()->json([
                'reply' => 'Silakan ketik pertanyaan Anda 😊'
            ]);
        }

        // ---------------------------------------------------
        // STEP 1: Cek sapaan umum terlebih dahulu
        // ---------------------------------------------------
        $greetings = ['halo', 'hai', 'hi', 'hello', 'hei', 'hey', 'p', 'permisi'];
        foreach ($greetings as $greeting) {
            if (levenshtein($input, $greeting) <= 2) {
                return response()->json([
                    'reply' => 'Halo! Selamat datang di Sejenak Studio 📸 Ada yang bisa saya bantu? (contoh: tanya soal harga, lokasi, reservasi, atau jam buka)'
                ]);
            }
        }

        // ---------------------------------------------------
        // STEP 2: Load semua FAQ dari database
        // ---------------------------------------------------
        $faqs = Faq::all();

        if ($faqs->isEmpty()) {
            return response()->json([
                'reply' => 'Maaf, database FAQ masih kosong. Silakan hubungi admin kami langsung.'
            ]);
        }

        // ---------------------------------------------------
        // STEP 3: Hitung skor kemiripan dengan setiap FAQ
        // ---------------------------------------------------
        $bestMatch = null;
        $bestScore = 0.0;

        // Pecah input user menjadi array kata-kata (filter kata sangat pendek)
        $inputWords = array_filter(explode(' ', $input), fn($w) => strlen($w) > 1);

        foreach ($faqs as $faq) {
            $question = strtolower($faq->question);

            // --- Skor A: Levenshtein string penuh (dinormalisasi) ---
            $levDistance  = levenshtein($input, $question);
            $maxLen       = max(strlen($input), strlen($question));
            $levSimilarity = $maxLen > 0 ? 1 - ($levDistance / $maxLen) : 0;

            // --- Skor B: Kecocokan per kata (word overlap) ---
            $qWords      = array_filter(explode(' ', $question), fn($w) => strlen($w) > 1);
            $wordMatches = 0;

            foreach ($inputWords as $iWord) {
                foreach ($qWords as $qWord) {
                    // Toleransi 1 karakter salah ketik per kata
                    if (levenshtein($iWord, $qWord) <= 1) {
                        $wordMatches++;
                        break; // sudah cocok, pindah ke kata input berikutnya
                    }
                }
            }

            $wordScore = count($inputWords) > 0
                ? $wordMatches / count($inputWords)
                : 0;

            // --- Gabungkan kedua skor (bobot 50:50) ---
            $combinedScore = ($levSimilarity * 0.5) + ($wordScore * 0.5);

            // Simpan jika ini skor terbaik sejauh ini
            if ($combinedScore > $bestScore) {
                $bestScore = $combinedScore;
                $bestMatch = $faq;
            }
        }

        // ---------------------------------------------------
        // STEP 4: Tentukan jawaban berdasarkan threshold
        // ---------------------------------------------------
        $threshold = 0.25; // Minimal 25% kemiripan agar jawaban diberikan

        if ($bestMatch && $bestScore >= $threshold) {
            $reply = $bestMatch->answer;
        } else {
            // Fallback message jika tidak ada yang cocok
            $reply = "Maaf, saya belum bisa memahami pertanyaan tersebut 🙏\n\nCoba tanyakan tentang:\n• Lokasi studio\n• Jam buka\n• Harga / paket\n• Cara reservasi\n• Proses edit foto\n\nAtau hubungi kami langsung via WhatsApp: 0812-3456-7890";
        }

        return response()->json([
            'reply'      => $reply,
            'score'      => round($bestScore, 3), // untuk keperluan debug/skripsi
            'matched_faq' => $bestMatch ? $bestMatch->question : null,
        ]);
    }
}
