<?php

namespace App\Http\Controllers\Incidencias;

use App\Http\Controllers\Controller;
use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function index()
    {
        $idf = Auth::user()->fraccionamiento;
        $reporte = Reporte::all()->where('fraccionamiento', $idf);
        return view('Operacion.Reportes.index', compact('reporte', 'idf'));
    }

    public function crear(Request $request)
    {
        $idf = Auth::user()->fraccionamiento;

        $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'razon' => ['required', 'string', 'max:255'],
        ]);

        Reporte::create([
            'titulo' => $request->titulo,
            'razon' => $request->razon,
            'fraccionamiento' => $idf,
        ]);

        return redirect()->back();
    }

    public function eliminar($id)
    {
        $ids = Reporte::find($id);
        $ids->delete();

        return redirect()->back();
    }
}
