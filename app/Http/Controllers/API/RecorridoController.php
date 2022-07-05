<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Recorrido;
use App\Models\Ubicacion;
use App\Models\User;

class RecorridoController extends Controller
{
    public function create(Request $request)
    {
        $recorrido = new Recorrido();
        $now = Carbon::now();
        $recorrido->fecha = $now->format('Y-m-d');
        $recorrido->horaSalida = $now->format('H:i');
        $recorrido->tipo = $request->tipo;
        $recorrido->save();

        return response()->json($recorrido);
    }

    public function detalleRecorrido(Request $request)
    {
        $userId = auth()->user()->id;
        $conductor = Conductor::where(['users_id' => $userId])->first();
        $micro = Microbus::where(['conductor_id' => $conductor->id])->first();

        $ubicacion = new Ubicacion();
        $ubicacion->latitud = $request->latitud;
        $ubicacion->longitud = $request->longitud;
        $ubicacion->micro_id = $micro->id;
        $ubicacion->recorrido_id = $request->recorrido_id;
        $ubicacion->save();

        return response()->json($ubicacion);
    }
}
