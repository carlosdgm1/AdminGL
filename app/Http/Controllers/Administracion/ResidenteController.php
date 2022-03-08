<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Mail\NotificacionResidentes;
use App\Models\Residentes;
use App\Models\TipoR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class ResidenteController extends Controller
{
    public function index()
    {
        $idf = Auth::user()->fraccionamiento;
        $tipo = TipoR::all()->where('fraccionamiento', $idf);
        return view('Administracion.Residente.index', compact('tipo'));
    }

    // ------------------------ TIPO DE RESIDENTE ------------------------

    //CREAR TIPO DE SERVICIO
    public function crearTR(Request $request)
    {
        $idf = Auth::user()->fraccionamiento;

        $request->validate([
            'tipo' => ['required', 'string', 'max:255'],
        ]);

        TipoR::create([
            'tipo' => $request->tipo,
            'fraccionamiento' => $idf,
        ]);

        return redirect()->back();
    }

    // ELIMINAR SERVICIO    
    public function eliminarTR($id)
    {
        $ids = TipoR::find($id);
        $ids->delete();

        return redirect()->back();
    }

    // ------------------------ RESIDENTE ------------------------

    public function createR(Request $request)
    {

        $idf = Auth::user()->fraccionamiento;

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'digits:10'],
            'direccion' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255'],
            'tipo' => ['required', 'string',  'max:255'],
        ]);

        Residentes::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'tipo' => $request->tipo,
            'correo' => $request->correo,
            'fraccionamiento' => $idf,
        ]);

        return redirect()->back()->with('info', 'Perfil de residente creado corrrectamente');
    }

    public function listR()
    {

        $idf = Auth::user()->fraccionamiento;
        $idr = Residentes::all()->where('fraccionamiento', $idf);
        $tipo = TipoR::all()->where('fraccionamiento', $idf);
        return view('Administracion.Residente.residentes', compact('idr', 'tipo'));
    }

    public function editarR($id)
    {

        $idf = Auth::user()->fraccionamiento;
        $idr = Residentes::all()->where('fraccionamiento', $idf)->where('id', $id);
        $tipo = TipoR::all()->where('fraccionamiento', $idf);
        return view('Administracion.Residente.edit', compact('idr', 'tipo'));
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

        $BR->update();
        return redirect()->back()->with('info', 'Residente editado');
    }


    // Notificaiones

    public function indexNoti()
    {
        $idf = Auth::user()->fraccionamiento;
        $residentes = Residentes::all()->where('fraccionamiento', $idf);
        return view('Administracion.Notificaiones.index', compact('residentes'));

    }
    public function notificacion(Request $request)
    {
        $p = Residentes::all();
        // dd($p);
        // dd($request->mensaje);
        foreach ($p as $mail){
                
            $usercorreo = [$mail->correo];
            $correo = new NotificacionResidentes($request->all());
            Mail::to($usercorreo)->send($correo);
            // return redirect()->back();

        }
       
        return redirect()->back();
        
    }
}
