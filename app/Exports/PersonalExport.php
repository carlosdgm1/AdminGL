<?php

namespace App\Exports;

use App\Models\Personal;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonalExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function query()
    {
        $idf = Auth::user()->fraccionamiento;
        return Personal::select('nombre', 'telefono', 'direccion', 'tipo', 'ine', 'servicio', 'idr')->where('fraccionamiento', $idf)->get();
    }

    public function headings(): array
{
    return [
        'Nombre',
        'Telefono',
        'Direccion',
        'Tipo',
        'Ine',
        'Servicio',
        'Trabaja para',
    ];
}
}
