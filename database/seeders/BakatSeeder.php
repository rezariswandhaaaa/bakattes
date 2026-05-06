<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BakatSeeder extends Seeder
{
     public function run(): void
    {
        $bakats = [
            ['nama_bakat' => 'Command', 'deskripsi' => 'Tegas, percaya diri, mampu memimpin dan mengambil keputusan di situasi sulit.', 'potensi_pekerjaan' => 'Manajer atau Supervisor Operasional, Kepala Departemen atau Koordinator Tim, Aparat Keamanan atau Militer.'],
            ['nama_bakat' => 'Activator', 'deskripsi' => 'Memiliki kemampuan untuk mengubah ide menjadi tindakan. Cenderung bergerak cepat dan lebih suka memulai sesuatu daripada hanya membicarakannya.', 'potensi_pekerjaan' => 'Wirausahawan, Project Manager, Sales Executive, Event Organizer, Startup Founder, Motivator'],
            ['nama_bakat' => 'Competition', 'deskripsi' => 'Termotivasi untuk menjadi yang terbaik dan menikmati tantangan untuk mengalahkan standar yang ada. Menyukai lingkungan kompetitif.', 'potensi_pekerjaan' => 'Sales & Marketing Manager, Atlet, Business Development, Konsultan, Manajer Penjualan, Pemasaran Digital'],
            ['nama_bakat' => 'Maximizer', 'deskripsi' => 'Berfokus pada kekuatan dan potensi unggul. Mendorong diri dan orang lain untuk mencapai kualitas tertinggi serta mengubah sesuatu yang baik menjadi luar biasa.', 'potensi_pekerjaan' => 'Quality Assurance Manager, HR Development, Konsultan, Manajer Proyek, Brand Strategist'],
            ['nama_bakat' => 'Self Assurance', 'deskripsi' => 'Memiliki keyakinan diri yang tinggi dan percaya pada keputusan sendiri. Mampu memimpin dengan percaya diri dan tidak mudah terpengaruh oleh tekanan eksternal.', 'potensi_pekerjaan' => 'Entrepreneur, Pemimpin Organisasi, Manajer Senior, Konsultan Independen, Negosiator, Public Speaker'],

        ];

        DB::table('bakats')->insert($bakats);
    }
}
