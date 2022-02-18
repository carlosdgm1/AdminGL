<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\Residentes;
use App\Models\ServicioP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    public function index()
    {
        $idf = Auth::user()->fraccionamiento;
        $idr = Residentes::all()->where('fraccionamiento', $idf);
        $servicio = ServicioP::all()->where('fraccionamiento', $idf);
        return view('Administracion.Personal.index', compact('servicio', 'idr'));
    }

    // ------------------------ SERVICIO ------------------------

    //CREAR SERVICIO
    public function crearSP(Request $request)
    {
        $idf = Auth::user()->fraccionamiento;

        $request->validate([
            'servicio' => ['required', 'string', 'max:255'],
        ]);

        ServicioP::create([
            'servicio' => $request->servicio,
            'fraccionamiento' => $idf,
        ]);

        return redirect()->back();
    }

    // ELIMINAR SERVICIO    
    public function eliminarSP($id)
    {
        $ids = ServicioP::find($id);
        $ids->delete();

        return redirect()->back();
    }

    // ------------------------ PERSONAL ------------------------

    //  CREAR PERSONAL

    public function createP(Request $request)
    {
        $idf = Auth::user()->fraccionamiento;

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'digits:10'],
            'direccion' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'max:255'],
            'ine' => ['required', 'string', 'max:255'],
            'servicio' => ['required', 'string', 'max:255'],
        ]);

        Personal::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'tipo' => $request->tipo,
            'ine' => $request->ine,
            'servicio' => $request->servicio,
            'idr' => $request->idr,
            'fraccionamiento' => $idf,
            'nota' => $request->nota,
        ]);

        return redirect()->back()->with('info', 'Perfil de personal creado corrrectamente');
    }
}
