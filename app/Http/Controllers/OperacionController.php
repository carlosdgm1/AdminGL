<?php

namespace App\Http\Controllers;

use App\Models\Arduino;
use App\Models\Visita;
use App\Models\Camaras;
use App\Models\Notificacion;
use App\Models\Personal;
use App\Models\Residentes;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;


class OperacionController extends Controller
{

    public function indexV()
    {
        $idf = Auth::user()->fraccionamiento;
        $BV = Visita::all()->where('fraccionamiento', $idf);
        $R = Residentes::all()->where('fraccionamiento', $idf);
        return view('Operacion.Visitantes.index', compact('BV', 'R'));
    }


    public function index($id)
    {
        $idf = Auth::user()->fraccionamiento;

        $idr = Residentes::where('id', $id)->where('fraccionamiento', $idf)->get();
        $reporte = Notificacion::all()->where('fraccionamiento', $idf)->where('idr', $id);
        $cam = Camaras::all()->where('fraccionamiento', $idf);
        $arduino = Arduino::all();
        $BV = Visita::where('estatus', 'abierta')
            ->where('fraccionamiento', $idf)
            ->get();
        return view('Operacion.crear', compact('idr', 'BV', 'cam', 'arduino', 'reporte'));
    }

    public function indexR()
    {
        $idf = Auth::user()->fraccionamiento;
        $idr = Residentes::all()->where('fraccionamiento', $idf);
        $cam = Camaras::all()->where('fraccionamiento', $idf);
        $arduino = Arduino::all();
        $BV = Visita::where('estatus', 'abierta')
            ->where('fraccionamiento', $idf)
            ->get();
        return view('Operacion.residentes', compact('idr', 'BV', 'cam', 'arduino'));
    }

    public function indexC()
    {
        $idf = Auth::user()->fraccionamiento;
        $idr = Residentes::all()->where('fraccionamiento', $idf);
        $cam = Camaras::all()->where('fraccionamiento', $idf);
        $arduino = Arduino::all();
        $BV = Visita::where('estatus', 'abierta')
            ->where('fraccionamiento', $idf)
            ->get();
        return view('Operacion.cerrar', compact('idr', 'BV', 'cam', 'arduino'));
    }


    public function openGate($id)
    {
        $open = Arduino::find($id);
        $fd = dio_open('com5:', O_RDWR);
        sleep(2);
        $wr = dio_write($fd, $open->abrir);
        sleep(2);
        dio_close($fd);
        return response()->json($wr);
    }
    public function closeGate($id)
    {
        $close = Arduino::find($id);
        $fd = dio_open('com5:', O_RDWR);
        sleep(2);
        $wr = dio_write($fd, $close->cerrar);
        sleep(2);
        dio_close($fd);
        return response()->json($wr);
    }

    public function store(Request $request)
    {
        $image_64 = $request->ine_foto; //your base64 encoded data
        // $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10) . '.png';
        Storage::disk('ine')->put($imageName, base64_decode($image));
        $request->ine_foto = $imageName;

        $image_64 = $request->cara_foto; //your base64 encoded data
        // $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        // find substring fro replace here eg: data:image/png;base64,
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10) . '.png';
        Storage::disk('cara')->put($imageName, base64_decode($image));
        $request->cara_foto = $imageName;

        $image_64 = $request->placa_foto; //your base64 encoded data
        //$extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        // find substring fro replace here eg: data:image/png;base64,
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10) . '.png';
        Storage::disk('placa')->put($imageName, base64_decode($image));
        $request->placa_foto = $imageName;
        $visita = new Visita();
        $visita->saveVisita($request);
        return redirect()->route('index-residente');
    }


    public function storeSalida(Request $request)
    {
        $image_64 = $request->salida_foto; //your base64 encoded data
        // $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10) . '.png';
        Storage::disk('salida')->put($imageName, base64_decode($image));
        $request->salida_foto = $imageName;
        $visita = Visita::find($request->id);
        $visita->salida = $request->salida_foto;
        $visita->estatus = ('cerrada');
        $visita->save();
        return response()->json($visita);
    }

    public function estatus($id)
    {

        $idr = Residentes::all();
        $BV = Visita::all()->where('estatus', 'abierta');

        $estatus = Visita::find($id);
        $estatus->estatus = ('cerrada');
        $estatus->save();


        return redirect()->back();
    }
}
