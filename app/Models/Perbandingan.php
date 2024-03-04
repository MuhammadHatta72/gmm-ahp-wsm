<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbandingan extends Model
{
    use HasFactory;

    // protected $primaryKey = 'id';
    protected $table = 'perbandingan';

    protected $fillable = [
        'id_kriteria_1',
        'id_kriteria_2',
        'nilai'
    ];
}
