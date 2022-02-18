<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residentes extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre',
        'telefono',
        'direccion',
        'correo',
        'fraccionamiento',
        'tipo',
    ];

    protected $table = 'residentes';
}
