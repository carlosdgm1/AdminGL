<?php

namespace App\Exports;

use App\Models\Personal;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

   

    public function collection()
    {
        $idf = Auth::user()->fraccionamiento;
        return Personal::select('nombre', 'telefono', 'direccion', 'tipo', 'ine', 'servicio', 'idr')->where('fraccionamiento', $idf)->get();
    }

   
}
