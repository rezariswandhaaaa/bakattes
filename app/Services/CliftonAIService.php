<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;

class CliftonAiService
{
    /**
     * Ambil potensi pekerjaan berdasarkan 7 bakat teratas
     */
    public static function potensiPekerjaan(string $top7Text): array
    {
        if (empty(trim($top7Text))) return [];

        $prompt = "
Berikut 7 bakat teratas pengguna:

$top7Text

Tugas kamu:
1. Berikan 7 potensi pekerjaan atau karir yang cocok berdasarkan 7 bakat teratas beserta penjelasannya.
2. Format teks:
1. Karir atau pekerjaan (teksnya uppercase) - deskripsi panjang berdasarkan 7 bakat teratas (maks 8 kalimat dan jangan ada ** dan tambahan apapun)
";

        try {
            $response = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => 'Kamu adalah analis karir berbasis CliftonStrengths.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

            $content = $response->choices[0]->message->content ?? '';
            $result = [];

            foreach (explode("\n", $content) as $line) {
                $line = trim($line);
                if ($line !== '') {
                    $result[] = $line;
                }
            }

            return $result;
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Ambil potensi bakat / area kekuatan
     */
    public static function potensiBakat(string $top7Text): array
    {
        if (empty(trim($top7Text))) return [];

        $prompt = "
Berdasarkan 7 bakat teratas berikut:

$top7Text

Tugas kamu:
1. Buatkan potensi bakat / area kekuatan berdasarkan gabungan bakat teratas (jangan ada ** atau tambahan apapaun).
2. Sertakan penjelasan 500 kata.
3. Format output:
No | Potensi Bakat / Area Kekuatan (jangan ada tambahan apapun) | Penjelasan
";

        try {
            $response = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => 'Kamu adalah analis potensi bakat berbasis CliftonStrengths.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

            $content = $response->choices[0]->message->content ?? '';
            $lines = explode("\n", $content);
            $result = [];

            foreach ($lines as $line) {
                $line = trim($line);
                if (
                    $line !== '' &&
                    preg_match('/^\d+\s*\|\s*(.+?)\s*\|\s*(.+)$/', $line, $m)
                ) {
                    $result[] = [
                        'potensi' => trim($m[1]),
                        'penjelasan' => trim($m[2]),
                    ];
                }
            }

            return $result;
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Ringkasan Public Speaking & Communication Style
     */
    public static function komunikasiSummary(string $top7Text): array
    {
        if (empty(trim($top7Text))) return [];

        $prompt = "
Berikut 7 bakat teratas pengguna:

$top7Text

Tugas kamu:
Buatkan ringkasan gaya komunikasi untuk SETIAP bakat.

FORMAT WAJIB (7 BARIS):
Talent | Kekuatan Public Speaking | Hal yang Perlu Dijaga | Strategi Komunikasi Ideal

RULES:
- Harus 7 baris (1 baris per bakat)
- Gunakan karakter | sebagai pemisah
- Setiap kolom 1 kalimat
- Jangan tampilkan header
- Jangan bullet atau numbering
";

        try {
            $response = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => 'Kamu adalah analis komunikasi berbasis CliftonStrengths.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

            $content = $response->choices[0]->message->content ?? '';
            $rows = explode("\n", $content);
            $result = [];

            foreach ($rows as $row) {
                if (!str_contains($row, '|')) continue;

                $col = array_map('trim', explode('|', $row));

                if (count($col) < 4) continue;

                $result[] = [
                    'talent'   => $col[0],
                    'kekuatan' => $col[1],
                    'hindari'  => $col[2],
                    'strategi' => $col[3],
                ];
            }

            if (count($result) < 7) {
                $result = array_pad($result, 7, [
                    'talent'   => '-',
                    'kekuatan' => 'Sedang diproses',
                    'hindari'  => 'Sedang diproses',
                    'strategi' => 'Sedang diproses',
                ]);
            }

            return $result;
        } catch (\Exception $e) {
            return [];
        }
    }
}
