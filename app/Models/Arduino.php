<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arduino extends Model
{
    use HasFactory;

    protected $fillable = [
        'estatus',
        'abrir',
        'cerrar',
        'fraccionamiento',
        'nonc',
        'panel',
        'puerto'
    ];

    protected $table = 'arduino';
}
