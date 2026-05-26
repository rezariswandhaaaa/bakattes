<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'kode_voucher',
        'tipe',
        'potongan',
        'kuota',
        'expired_at'
    ];

    protected $casts = [
        'expired_at' => 'datetime',
    ];
}
