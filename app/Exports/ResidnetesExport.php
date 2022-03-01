<?php

namespace App\Exports;

use App\Models\Residentes;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class ResidnetesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $idf = Auth::user()->fraccionamiento;
        return Residentes::select('nombre', 'telefono', 'direccion', 'correo', 'tipo')->where('fraccionamiento', $idf)->get();
    }
}
