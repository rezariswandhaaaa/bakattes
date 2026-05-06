<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bakat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bakat',
        'deskripsi',
        'potensi_pekerjaan',
    ];

    public function pertanyaans()
    {
        return $this->hasMany(Pertanyaan::class);
    }
}
