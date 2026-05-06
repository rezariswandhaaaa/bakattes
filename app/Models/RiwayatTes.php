<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTes extends Model
{
    use HasFactory;

    // Karena nama tabel Anda 'riwayat_tes' (snake_case),
    // kita definisikan secara manual agar Laravel tidak bingung.
    protected $table = 'riwayat_tes';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'user_id',
        'transaksi_id',
        'nama_file',
        'file_path',
        'top_7_bakat',
        'hasil_json',
    ];

    // Casting hasil_json agar otomatis menjadi array saat dipanggil di Controller/View
    protected $casts = [
        'hasil_json' => 'array',
    ];

    /**
     * Relasi ke model User.
     * Setiap riwayat tes dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
