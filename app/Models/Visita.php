<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visita extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'telefono',
        'ine',
        'motivo',
        'placa',
        'fecha',
        'idr',
        'placa_foto',
        'ine_foto',
        'cara_foto',
        'fraccionamiento',
        'estatus'
    ];

    protected $table = 'visitantes';

    public function saveVisita(Request $request)
    {
        $all = [
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'ine' => $request->ine,
            'motivo' => $request->motivo,
            'placa' => $request->placa,
            'fecha' => $request->fecha,
            'idr' => $request->idr,
            'placa_foto' => $request->placa_foto,
            'ine_foto' => $request->ine_foto,
            'cara_foto' => $request->cara_foto,
            'fraccionamiento' => Auth::user()->fraccionamiento,
            'estatus' => 'abierta'
        ];
        $this->fill($all);
        $this->save();
        return $this->toArray();
    }
}
