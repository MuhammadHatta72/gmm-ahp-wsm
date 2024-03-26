<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'jenis',
    ];

    public function geomean(): HasMany
    {
        return $this->hasMany(Geomean::class);
    }

    public function anhipo(): HasMany
    {
        return $this->hasMany(Anhipro::class);
    }
}
