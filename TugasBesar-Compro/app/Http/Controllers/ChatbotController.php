<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    /**
     * Menangani permintaan dari chatbot.
     */
    public function handle(Request $request)
    {
        $input = strtolower($request->input('message', ''));
        
        if (empty($input)) {
            return response()->json(['reply' => 'Halo! Ada yang bisa saya bantu terkait reservasi di Sejenak Studio?']);
        }

        $faqs = Faq::all();
        $bestMatch = null;
        $shortestDistance = -1;
        $threshold = 5; // Toleransi kesalahan karakter (typo)

        foreach ($faqs as $faq) {
            // Hitung jarak Levenshtein antara input user dan pertanyaan di database
            $distance = levenshtein($input, strtolower($faq->question));

            // Jika ini jarak terpendek sejauh ini, simpan sebagai kandidat terbaik
            if ($shortestDistance === -1 || $distance < $shortestDistance) {
                $shortestDistance = $distance;
                $bestMatch = $faq;
            }
        }

        // Jika jarak dalam ambang batas (threshold), berikan jawaban
        if ($bestMatch && ($shortestDistance <= $threshold)) {
            $reply = $bestMatch->answer;
        } else {
            // Fallback jika tidak ada yang cocok
            $reply = "Maaf, saya belum memahami pertanyaan Anda. Silakan coba gunakan kata kunci lain (contoh: lokasi, harga, atau cara reservasi) atau hubungi admin kami via WhatsApp.";
        }

        return response()->json([
            'reply' => $reply,
            'distance' => $shortestDistance, // Opsional untuk debugging
        ]);
    }
}
