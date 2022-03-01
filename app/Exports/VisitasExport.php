<?php

namespace App\Exports;

use App\Models\Visita;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class VisitasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $idf = Auth::user()->fraccionamiento;
        return Visita::select('nombre', 'telefono', 'ine', 'placa', 'motivo')->where('fraccionamiento', $idf)->get();
    
    }
}
