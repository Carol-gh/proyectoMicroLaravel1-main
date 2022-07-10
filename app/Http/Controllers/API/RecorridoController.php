<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Recorrido;
use App\Models\Ubicacion;
use App\Models\Conductor;
use App\Models\Microbus;
use App\Models\User;

class RecorridoController extends Controller
{
    public function create(Request $request)
    {
        $userId = auth()->user()->id;
        $conductor = Conductor::where(['users_id' => $userId])->first();
        $micro = Microbus::where(['conductor_id' => $conductor->id])->first();

        $recorrido = new Recorrido();
        $now = Carbon::now();
        $recorrido->fecha = $now->format('Y-m-d');
        $recorrido->horaSalida = $now->format('H:i');
        $recorrido->horaLLegada = $request->horaLlegada;
        $recorrido->latitud = $request->latitud;
        $recorrido->longitud = $request->longitud;
        $recorrido->tiempo = $request->tiempo;
        $recorrido->tipo = $request->tipo;
        $recorrido->drive_id = $micro->id;
        $recorrido->save();

        return response()->json($recorrido);
    }

    public function update(Request $request, $id)
    {
        $track = Recorrido::find($id);

        if(!$track)
        {
            return response([
                'message' => 'Tracking not found.'
            ], 403);
        }

        $track->update([
            'latitud' =>  $request->latitud,
            'longitud' => $request->longitud
        ]);

        return response([
            'message' => 'Recorrido updated.',
            'recorrido' => $track
        ], 200);
    }
}
