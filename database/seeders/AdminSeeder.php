<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Cari admin berdasarkan role
        $admin = User::where('role', 'admin')->first();

        if ($admin) {
            // Update email dan password admin
            $admin->update([
                'email' => 'bakattes75@gmail.com',
                'password' => Hash::make('Urbraindevpro@!123') // password baru
            ]);
        } else {
            // Buat admin baru jika belum ada
            User::create([
                'name' => 'Admin',
                'email' => 'bakattes75@gmail.com',
                'password' => Hash::make('Urbraindevpro@!123'),
                'role' => 'admin'
            ]);
        }
    }
}
