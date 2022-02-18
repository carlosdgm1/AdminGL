<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioP extends Model
{
    use HasFactory;

    protected $fillable = ['servicio', 'fraccionamiento'];


    protected $table = 'servicio_p';
}
