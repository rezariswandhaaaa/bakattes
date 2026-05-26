<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'user_id',
        'produk_id',
        'xendit_invoice_id', // Digunakan untuk mencari data saat callback
        'invoice_url',       // Tambahkan ini agar link Xendit tersimpan
        'amount',
        'status',            // Digunakan untuk update jadi PAID
        'bukti_pembayaran',
        'is_verified',
        'payment_type',
        'paid_at',           // Digunakan untuk mencatat waktu bayar
    ];

    // Opsional: Agar Laravel otomatis mengubah string tanggal menjadi objek Carbon
    protected $casts = [
        'paid_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
