<?php

namespace App\Http\Controllers\Busqueda;

use App\Exports\PersonalExport;
use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\ServicioP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BusquedaPController extends Controller
{
    public function index()
    {
        $idf = Auth::user()->fraccionamiento;
        $BP = Personal::all()->where('fraccionamiento', $idf);
        $servicio = ServicioP::all()->where('fraccionamiento', $idf);
        return view('Busqueda.Personal.index', compact('BP', 'servicio'));

    }


    public function export() 
    {
        return Excel::download(new PersonalExport, 'personal.xlsx');
    }

    public function update(Request $request,  $id)
    {
        $idf = Auth::user()->fraccionamiento;
        $BP = Personal::find($id);

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'digits:10'],
            'direccion' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'max:255'],
            'ine' => ['required', 'string', 'max:255'],
            'servicio' => ['required', 'string', 'max:255'],
        ]);

        $BP->nombre = request('nombre');
        $BP->telefono = request('telefono');
        $BP->direccion = request('direccion');
        $BP->tipo = request('tipo');
        $BP->ine = request('ine');
        $BP->servicio = request('servicio');
        $BP->nota = request('nota');

        $BP->update();

        return redirect()->back()->with('info', 'Perfil de personal actualizado corrrectamente');
    }

    
    public function deleteP($id)
    {
        $BP = Personal::find($id);
        $BP->delete();
        return redirect()->back();
    }
}
