<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DateTime;
use App\Models\Recorrido;
use App\Models\Linea;
use App\Models\User;
use App\Models\MicroConductor;
use App\Models\Conductor;

class RecorridoController extends Controller
{
    public function create(Request $request)
    {
        $userId = auth()->user()->id;
        $user = User::where(['id' => $userId])->first();
        $linea = Linea::where(['nombre' => $user->linea])->first();
        $tiempo = $linea->tiempo;

        $now = Carbon::now();
        $newtime = Carbon::now()->addMinutes($tiempo);

        $conductor = Conductor::where(['users_id' => $userId])->first();
        $driving = MicroConductor::where([
            'conductor_id' => $conductor->id,
            'fecha' => $now->format('Y-m-d')
        ])->first();

        $recorrido = new Recorrido();
        $recorrido->fecha = $now->format('Y-m-d');
        $recorrido->horaSalida = $now->format('H:i');
        $recorrido->horaLLegada = $newtime->format('H:i');
        $recorrido->latitud = $request->latitud;
        $recorrido->longitud = $request->longitud;
        $recorrido->tiempo = $tiempo;
        $recorrido->tipo = $request->tipo;
        $recorrido->drive_id = $driving->id;
        $recorrido->save();

        return response()->json([
            'message' => 'Recorrido creado',
            'recorrido' => $recorrido
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $track = Recorrido::find($id);
        $horaUpd = $track->updated_at->format('H:i');
        $dateUpd = new DateTime($horaUpd);
        $dateOld = new DateTime($track->horaSalida);
        $llegTime = new DateTime($track->horaLLegada);
        $tiempoUpd = $dateOld->diff($dateUpd);
        $tiempoUpd = $tiempoUpd->format('%h:%i:%s');
        $retraso = $llegTime->diff($dateUpd);
        $retraso = $retraso->format('%h:%i:%s');

        if(!$track)
        {
            return response([
                'message' => 'Tracking not found.'
            ], 403);
        }

        $track->update([
            'latitud' =>  $request->latitud,
            'longitud' => $request->longitud,
            'tiempo' => $tiempoUpd,
            'retraso' => $retraso
        ]);

        return response([
            'message' => 'Recorrido updated.',
            'recorrido' => $track
        ], 200);
    }
}
