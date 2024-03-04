<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    use HasFactory;

    protected $table = 'bobot';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_kriteria',
        'bobot',
    ];

    function Kriteria(){
        return $this->belongsTo(Kriteria::class,'id_kriteria','id_kriteria');
    }
}
