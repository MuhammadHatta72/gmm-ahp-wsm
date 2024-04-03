<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WsmResultNormalization extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'utilisasi',
        'availability',
        'reliability',
        'idle',
        'jam_tersedia',
        'jam_operasi',
        'jam_bda',
        'jumlah_bda',
        'hasil',
        'rangking',
    ];
}
