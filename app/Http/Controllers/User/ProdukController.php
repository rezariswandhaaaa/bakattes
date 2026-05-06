<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Produk;


class ProdukController extends Controller
{

    public function index()
    {
        $produks = Produk::all();
        return view('user.produk', compact('produks'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.index', compact('produk'));
    }
}
