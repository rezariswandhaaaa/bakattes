<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // (Opsional) Tentukan tabel kalau kamu ingin nama tabelnya berbeda
    protected $table = 'produks';

    // (Opsional) Tentukan kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
    ];
}
