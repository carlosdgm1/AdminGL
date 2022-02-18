<?php

namespace App\Http\Controllers\Incidencias;

use App\Http\Controllers\Controller;
use App\Models\Notificacion;
use App\Models\Residentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    public function index()
    {
        $idf = Auth::user()->fraccionamiento;
        $reporte = Notificacion::all()->where('fraccionamiento', $idf);
        $idr = Residentes::all()->where('fraccionamiento', $idf);
        return view('Operacion.Notificaciones.residentes', compact('reporte', 'idf', 'idr'));
    }

    public function index2($id)
    {
        $idf = Auth::user()->fraccionamiento;
        $residentes = Residentes::where(['id' => $id])->first();
        $idr = Residentes::where('fraccionamiento', $idf);
        $reporte = Notificacion::all()->where('fraccionamiento', $idf)->where('idr', $id);
        return view('Operacion.Notificaciones.index', compact('reporte', 'idf', 'residentes', 'idr'));
    }

    public function crear(Request $request)
    {
        $idf = Auth::user()->fraccionamiento;

        $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'razon' => ['required', 'string', 'max:255'],
        ]);

        Notificacion::create([
            'titulo' => $request->titulo,
            'razon' => $request->razon,
            'idr' => $request->idr,
            'fraccionamiento' => $idf,
        ]);

        return redirect()->back();
    }

    public function eliminar($id)
    {
        $ids = Notificacion::find($id);
        $ids->delete();

        return redirect()->back();
    }


}
