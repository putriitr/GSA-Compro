<?php

namespace App\Helpers;

use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateHelper
{
    public static function translate($text, $targetLang)
    {
        // Periksa apakah $text null atau string kosong
        if (empty($text)) {
            return 'Teks tidak tersedia untuk diterjemahkan'; // Atau return nilai default lainnya
        }

        try {
            $tr = new GoogleTranslate(); // Inisialisasi Google Translate tanpa API key
            $tr->setTarget($targetLang); // Set bahasa tujuan
            return $tr->translate($text); // Terjemahkan teks
        } catch (\Exception $e) {
            // Tangani kesalahan yang mungkin terjadi
            return 'Terjadi kesalahan saat menerjemahkan: ' . $e->getMessage();
        }
    }
}
