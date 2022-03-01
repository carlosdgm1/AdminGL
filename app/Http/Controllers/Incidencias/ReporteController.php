<?php

namespace App\Http\Controllers\Incidencias;

use App\Http\Controllers\Controller;
use App\Mail\EditarReporte;
use App\Mail\NuevoReporte;
use App\Mail\UpdateReporte;
use App\Models\Correo;
use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ReporteController extends Controller
{
    public function index()
    {
        $idf = Auth::user()->fraccionamiento;
        $reporte = Reporte::all()->where('fraccionamiento', $idf);
        $correo = Correo::all()->where('fraccionamiento', $idf);
        return view('Operacion.Reportes.index', compact('reporte', 'idf', 'correo'));
      
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

        $usercorreo = ($request->correo);
        $correo = new NuevoReporte($request->all());
        Mail::to($usercorreo)->send($correo);

        return redirect()->back();
    }

    
    public function edit(Request $request, $id)
    {
    

        $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'razon' => ['required', 'string', 'max:255'],
        ]);

        $reporte = Reporte::find($id);

        $reporte->titulo = $request->titulo;
        $reporte->razon = $request->razon;
        $reporte->update();


        $usercorreo = ($request->correo);
        $correo = new UpdateReporte($request->all());
        Mail::to($usercorreo)->send($correo);


        return redirect()->back();
    }

    public function eliminar($id)
    {
        $ids = Reporte::find($id);
        $ids->delete();

        return redirect()->back();
    }
}
