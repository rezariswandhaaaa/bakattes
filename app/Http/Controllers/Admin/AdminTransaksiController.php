<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;


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
}
