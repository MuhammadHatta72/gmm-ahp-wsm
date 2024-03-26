<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsistencyRatio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hasil'
    ];
}
