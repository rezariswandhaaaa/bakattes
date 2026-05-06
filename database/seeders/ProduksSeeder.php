<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProduksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        DB::table('produks')->insert([
            [
                'nama_produk' => 'Tes Bakat CliftonStrengths',
                'deskripsi' => 'Tes ini membantu menemukan kekuatan dominan dan potensi karier Anda.',
                'harga' => 50000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
