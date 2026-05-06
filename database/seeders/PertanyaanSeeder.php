<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PertanyaanSeeder extends Seeder
{
    public function run(): void
    {
        $pertanyaans = [
            ['bakat_id' => 1, 'pertanyaan' => 'Saya tidak ragu menyuarakan pendapat saya, meskipun berbeda.'],
            ['bakat_id' => 1, 'pertanyaan' => 'Saya merasa nyaman mengambil keputusan dalam situasi sulit.'],
            ['bakat_id' => 1, 'pertanyaan' => 'Saya lebih suka membiarkan orang lain yang memimpin dan menentukan arah pekerjaan.'],

            ['bakat_id' => 2, 'pertanyaan' => 'Saya cenderung menunda-nunda sebelum memulai sesuatu yang penting.'],
            ['bakat_id' => 2, 'pertanyaan' => 'Saya sering merasa sulit untuk memulai proyek baru atau mengambil langkah pertama.'],
            ['bakat_id' => 2, 'pertanyaan' => 'Saya selalu bersemangat untuk segera memulai pekerjaan baru tanpa ragu.'],
            ['bakat_id' => 2, 'pertanyaan' => 'Saya cepat mengambil tindakan ketika melihat peluang atau masalah yang harus diselesaikan.'],

            ['bakat_id' => 3, 'pertanyaan' => 'Saya merasa terdorong untuk menjadi yang terbaik ketika melihat orang lain sukses.'],
            ['bakat_id' => 3, 'pertanyaan' => 'Saya menikmati situasi di mana saya bisa bersaing dan membuktikan kemampuan saya.'],
            ['bakat_id' => 3, 'pertanyaan' => 'Saya tidak terlalu peduli jika orang lain lebih unggul dari saya.'],
            ['bakat_id' => 3, 'pertanyaan' => 'Saya merasa tidak nyaman dalam lingkungan yang kompetitif.'],

            ['bakat_id' => 4, 'pertanyaan' => 'Saya yakin pada keputusan yang saya buat, bahkan jika orang lain meragukannya.'],
            ['bakat_id' => 4, 'pertanyaan' => 'Saya merasa mampu mengatasi tantangan tanpa banyak bergantung pada bantuan orang lain.'],
            ['bakat_id' => 4, 'pertanyaan' => 'Saya sering merasa ragu dengan pilihan saya sendiri dan lebih suka menunggu pendapat orang lain.'],

            ['bakat_id' => 5, 'pertanyaan' => 'Saya selalu berusaha mengasah kemampuan dan mengembangkan kelebihan yang saya miliki untuk mencapai hasil yang maksimal.'],
            ['bakat_id' => 5, 'pertanyaan' => 'Saya cenderung fokus pada hal-hal yang sudah berjalan baik dan mencari cara untuk membuatnya menjadi lebih luar biasa.'],
            ['bakat_id' => 5, 'pertanyaan' => 'Saya sering merasa sulit untuk puas dan cenderung terlalu kritis terhadap hasil kerja saya sendiri maupun orang lain.'],
            ['bakat_id' => 5, 'pertanyaan' => 'Saya terkadang terlalu lama memperbaiki sesuatu yang sebenarnya sudah cukup baik, sehingga menghambat progres saya.'],
            
        ];

        DB::table('pertanyaans')->insert($pertanyaans);
    }
}
