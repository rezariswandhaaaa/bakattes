<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RiwayatTes;

class RiwayatTesController extends Controller
{
    public function index()
    {
        $riwayats = RiwayatTes::with('user')->latest()->get();
        $riwayats = RiwayatTes::with('user','transaksi.produk')->latest()->paginate(10);
        return view('admin.riwayat.index', compact('riwayats'));
    }

    // PASTIKAN FUNGSI INI ADA DAN NAMANYA SAMA DENGAN DI ROUTE
    public function download($id)
    {
        $riwayat = RiwayatTes::findOrFail($id);

        // Mendapatkan path lengkap ke file di folder storage/app/public/
        $path = storage_path('app/public/' . $riwayat->file_path);

        // Cek apakah file benar-benar ada di folder tersebut
        if (!file_exists($path)) {
            return back()->with('error', 'Maaf, file fisik PDF tidak ditemukan di server.');
        }

        // Melakukan proses download
        return response()->download($path, $riwayat->nama_file);
    }
}
