<?php

namespace App\Http\Controllers\Busqueda;

use App\Exports\VisitasExport;
use App\Http\Controllers\Controller;
use App\Models\Residentes;
use App\Models\Visita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class VisitantesController extends Controller
{
      // PANTALLA VISITANTE
      public function indexV()
      {
          $idf = Auth::user()->fraccionamiento;
          $BV = Visita::all()->where('fraccionamiento', $idf);
          $R = Residentes::all()->where('fraccionamiento', $idf);
          return view('Busqueda.Visitantes.index', compact('BV', 'R'));
      }

      public function export() 
    {
        return Excel::download(new VisitasExport, 'visitantes.xlsx');
    }
    
      public function deleteR($id)
    {
        $BR = Visita::find($id);
        $BR->delete();
        return redirect()->back();
    }
}
