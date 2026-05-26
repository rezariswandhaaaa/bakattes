<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bakat;
use App\Models\Pertanyaan;
use App\Models\RiwayatTes;
use App\Models\Transaksi;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        // Hitung total user
        $totalUsers = User::where('role', 'user')->count();
        $totalPertanyaan = Pertanyaan::count();

        // Hitung total bakat
        $totalBakat = Bakat::count();

        $totalTesSelesai = RiwayatTes::count();

        // Tambahkan 2 variabel baru ini
        $totalTransaksi = Transaksi::count();
        $transaksiMenunggu = Transaksi::where('status', 'PAID')->where('is_verified', 0)->count();


        // (Opsional) nanti bisa tambah data lain seperti total tes atau pendapatan
        // $totalTests = Test::count();
        // $totalRevenue = Order::sum('amount');

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPertanyaan',
            'totalBakat',
            'totalTesSelesai',
            'totalTransaksi',
            'transaksiMenunggu',
        ));
    }

    public function cekNotif()
    {
        // Hitung berapa transaksi yang sudah dibayar (PAID) tapi belum di-ACC admin (is_verified = 0)
        $menungguVerifikasi = Transaksi::where('status', 'PAID')->where('is_verified', 0)->count();

        return response()->json([
            'menunggu' => $menungguVerifikasi
        ]);
    }
}
