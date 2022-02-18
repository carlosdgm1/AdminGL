<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoR extends Model
{
    use HasFactory;
    protected $fillable =[ 'tipo','fraccionamiento'];

    protected $table = 'tipo_residentes';
}
