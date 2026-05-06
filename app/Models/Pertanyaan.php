<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'bakat_id',
        'pertanyaan',
        'is_reverse',
    ];

    public function bakat()
    {
        return $this->belongsTo(Bakat::class);
    }
    public function jawabans()
    {
        return $this->hasMany(Jawaban::class);
    }
}
