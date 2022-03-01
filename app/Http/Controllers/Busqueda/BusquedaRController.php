<?php

namespace App\Http\Controllers\Busqueda;

use App\Exports\ResidnetesExport;
use App\Http\Controllers\Controller;
use App\Models\Residentes;
use App\Models\TipoR;
use App\Models\Vehiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class BusquedaRController extends Controller
{
    public function indexR()
    {
        $idf = Auth::user()->fraccionamiento;
        $tipo = TipoR::all()->where('fraccionamiento', $idf);
        $BR = Residentes::all()->where('fraccionamiento', $idf);
        $vehiculo = Vehiculos::all();
        return view('Busqueda.Residentes.index',  compact('BR', 'tipo', 'vehiculo'));
    }

    public function export() 
    {
        return Excel::download(new ResidnetesExport, 'residentes.xlsx');
    }

    public function updateR($id, Request $request)
    {

        $BR = Residentes::find($id);

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'digits:10'],
            'direccion' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255'],
        ]);

        $BR->nombre = request('nombre');
        $BR->telefono = request('telefono');
        $BR->direccion = request('direccion');
        $BR->correo = request('correo');
        $BR->tipo = request('tipo');

        $BR->save();
        return redirect()->back();
    }

    public function deleteR($id)
    {
        $BR = Residentes::find($id);
        $BR->delete();
        return redirect()->back();
    }

    // Vehiculos

    public function crearVehiculo(Request $request){

        Vehiculos::create([

            'placa' => $request->placa,
            'tarjeta' => $request->tarjeta,
            'idr' => $request->idr,

        ]);

        return redirect()->back();

    } 
    
}
