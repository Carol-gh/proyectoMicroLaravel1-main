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
use App\Models\Microbus;
use App\Models\Conductor;
use App\Models\Comment;

class RecorridoController extends Controller
{
    public function createTrack(Request $request, $id)
    {
        $conductor = Conductor::findOrFail($id);
        $user = User::where(['id' => $conductor->users_id])->first();
        $linea = Linea::where(['id' => $user->linea_id])->first();
        $tiempo = $linea->tiempo;

        $now = Carbon::now();
        $newtime = Carbon::now()->addMinutes($tiempo);

        $recorrido = new Recorrido();
        $recorrido->fecha = $now->format('Y-m-d');
        $recorrido->horaSalida = $now->format('H:i');
        $recorrido->horaLLegada = $newtime->format('H:i');
        $recorrido->latitud = $request->latitud;
        $recorrido->longitud = $request->longitud;
        $recorrido->tiempo = $tiempo;
        $recorrido->tipo = $request->tipo;
        $recorrido->conductor_id = $conductor->id;
        $recorrido->save();

        return response()->json([
            'message' => 'Recorrido creado',
            'recorrido' => $recorrido
        ], 200);
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
            'longitud' => $request->longitud,
        ]);

        return response()->json([
            'message' => 'Recorrido updated.',
            'recorrido' => $track
        ], 200);
    }

    public function finishRecorrido($id)
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
        $horaUpdate = $track->updated_at->format('H:i');

        $track->tiempo = $tiempoUpd;
        $track->retraso = $retraso;
        $track->horaLLegada = $horaUpd;
        $track->estado = 'Desactivado';
        $track->save();

        return response()->json([
            'message' => 'Terminar recorrido exitoso.',
            'recorrido' => $track
        ], 200);
    }

    public function saveRetiro(Request $request)
    {
        $recorridoId = $request->recorrido_id;
        $track = Recorrido::find($recorridoId);
        $horaUpdate = $track->updated_at->format('H:i');

        $comment = new Comment();
        $comment->motivo = $request->motivo;
        $comment->horaRetiro = $horaUpdate;
        $comment->recorrido_id = $recorridoId;
        $comment->save();

        $track->estado = 'Desactivado';
        $track->save();

        return response()->json([
            'message' => 'Salir recorrido exitoso.',
            'comentario' => $comment
        ], 200);
    }

    public function getCoordinates(Request $request)
    {
        $linea = $request->linea;
        $tipo = $request->tipo;
        $now = Carbon::now();
        $fechaActual = $now->format('Y-m-d');

        $recorridos = Recorrido::where([
            'fecha' => $fechaActual,
            'estado' => 'activo',
        ])->get();

        $list = [];

        foreach ($recorridos as $recorrido) {
            $conductor = Conductor::where(['id' => $recorrido->conductor_id])->first();
            $micro = Microbus::where(['id' => $conductor->microbus_id])->first();
            $user = User::where(['id' => $conductor->users_id])->first();
            $lineaMicro = Linea::where(['id' => $user->linea_id])->first();

            $item = new \stdClass();
            if ($linea == $lineaMicro->nombre) {
                $item->id = $recorrido->id;
                $item->latitud = $recorrido->latitud;
                $item->longitud = $recorrido->longitud;
                $item->tipo = $recorrido->tipo;
                $item->interno = $micro->nroInterno;
            }
            array_push($list, $item);
        }

        return response()->json($list, 200);
    }

    public function ubicaciones($linea, $tipo)
    {
        $now = Carbon::now();
        $fechaActual = $now->format('Y-m-d');

        $recorridos = Recorrido::where([
            'fecha' => $fechaActual,
            'estado' => 'activo',
        ])->get();

        $list = [];

        foreach ($recorridos as $recorrido) {
            $conductor = Conductor::where(['id' => $recorrido->conductor_id])->first();
            $micro = Microbus::where(['id' => $conductor->microbus_id])->first();
            $user = User::where(['id' => $conductor->users_id])->first();
            $lineaMicro = Linea::where(['id' => $user->linea_id])->first();

            $item = new \stdClass();
            if ($linea == $lineaMicro->nombre) {
                $item->id = $recorrido->id;
                $item->latitud = $recorrido->latitud;
                $item->longitud = $recorrido->longitud;
                $item->tipo = $recorrido->tipo;
                $item->interno = $micro->nroInterno;
            }
            array_push($list, $item);
        }

        return response()->json($list, 200);
    }
}
