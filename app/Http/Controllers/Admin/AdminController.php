<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bakat;
use App\Models\Pertanyaan;
use App\Models\RiwayatTes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


        // (Opsional) nanti bisa tambah data lain seperti total tes atau pendapatan
        // $totalTests = Test::count();
        // $totalRevenue = Order::sum('amount');

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPertanyaan',
            'totalBakat',
            'totalTesSelesai'
        ));
    }
}
