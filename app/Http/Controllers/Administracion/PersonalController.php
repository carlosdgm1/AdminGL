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

    // Editar personal

    public function listP()
    {
        $idf = Auth::user()->fraccionamiento;
        $idp = Personal::all()->where('fraccionamiento', $idf);
        $idr = Residentes::all()->where('fraccionamiento', $idf);
        return view('Administracion.Personal.personal', compact('idp', 'idr'));
    }

    public function editarP($id)
    {

        $idf = Auth::user()->fraccionamiento;
        $idp = Personal::all()->where('fraccionamiento', $idf)->where('id', $id);
        $servicio = ServicioP::all()->where('fraccionamiento', $idf);
        $idr = Residentes::all()->where('fraccionamiento', $idf);
        return view('Administracion.Personal.editar', compact('idp', 'servicio', 'idr'));
    }

    public function updateP(Request $request,  $id)
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
    
}
