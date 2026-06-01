<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        // Mengambil semua transaksi, diurutkan dari yang terbaru
        // Pastikan relasi 'user' dan 'produk' sudah ada di model Transaksi
        $transaksis = Transaksi::with(['user', 'produk'])->latest()->get();

        return view('admin.transaksi.index', compact('transaksis'));
    }

    public function setuju($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'status' => 'PAID',
            'is_verified' => 1,
            'paid_at' => now(),
        ]);

        return back()->with('success', 'Transaksi ID #' . $transaksi->id . ' berhasil diverifikasi.');
    }

    public function deleteBulanan(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'bulan_tahun' => 'required',
        ], [
            'bulan_tahun.required' => 'Bulan dan Tahun wajib dipilih!'
        ]);

        // 2. Ambil data dengan metode input() agar lebih aman dari error "Undefined Property"
        $inputBulanTahun = $request->input('bulan_tahun');

        try {
            // 3. Pecah tahun dan bulan menggunakan Carbon
            $date = Carbon::parse($inputBulanTahun);
            $year = $date->year;
            $month = $date->month;

            // 4. Hitung jumlah transaksi sebelum dihapus
            $transaksiCount = Transaksi::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->count();

            // Jika tidak ada data
            if ($transaksiCount === 0) {
                return back()->with('error', 'Tidak ada data transaksi ditemukan pada bulan tersebut.');
            }

            // 5. Eksekusi Hapus Data
            Transaksi::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->delete();

            // 6. Nama bulan untuk pesan sukses (Contoh: May 2026)
            $bulanNama = $date->translatedFormat('F Y');

            return back()->with('success', "Sebanyak {$transaksiCount} data transaksi pada bulan {$bulanNama} berhasil dihapus.");
        } catch (\Exception $e) {
            // Tangkap jika masih ada error format
            return back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }
}
