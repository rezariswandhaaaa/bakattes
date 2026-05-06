<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->get();
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi'   => 'required',
            'harga'       => 'required',
        ]);

        $harga = str_replace('.', '', $request->harga);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $harga,
        ]);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }


    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi'   => 'required',
            'harga'       => 'required',
        ]);

        $harga = str_replace('.', '', $request->harga);

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $harga,
        ]);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil diupdate');
    }


    public function destroy(Produk $produk)
    {
        $produk->delete();

        return back()->with('success', 'Produk berhasil dihapus');
    }
}
