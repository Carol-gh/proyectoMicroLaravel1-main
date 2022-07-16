<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Microbus;
use App\Models\Linea;
use App\Models\Conductor;
use App\Models\User;

class MicrobusController extends Controller
{
    public function createBus(Request $request)
    {
        $userId = auth()->user()->id;
        $conductor = Conductor::where(['users_id' => $userId])->first();
        $now = Carbon::now();
        $fecha_actual = $now->format('Y-m-d');

        $validator = Validator::make($request->all(), [
            'placa'=> 'required',
            'nroInterno' => 'required',
            'modelo' => 'required',
            'nro_asientos' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $microbus = Microbus::create(
            array_merge($validator->validate(),),
        );

        $image = $this->saveImage($request->foto, 'imagenes');
        $microbus->foto = $image;
        $microbus->fecha_asignacion = $request->fecha_asignacion;
        $microbus->fecha_baja = $request->fecha_baja;
        $microbus->save();

        $driving = new MicroConductor();
        $driving->fecha = $fecha_actual;
        $driving->conductor_id = $conductor->id;
        $driving->micro_id = $microbus->id;
        $driving->save();

        $microbus->estado = 'Ocupado';
        $microbus->save();

        return response()->json([
            'message' => 'Microbus creado',
            'microbus' => $microbus,
            'conduce' => $driving
        ], 401);
    }

    public function getBus($id) {
        $conductor = Conductor::findOrFail($id);
        $user = User::where(['id' => $conductor->users_id])->first();
        $linea = Linea::where(['id' => $user->linea_id])->first();
        $micro = Microbus::where(['conductor_id' => $conductor->id])->first();

        $bus = new \stdClass();
        $bus->id = $micro->id;
        $bus->placa = $micro->placa;
        $bus->modelo = $micro->modelo;
        $bus->interno = $micro->nroInterno;
        $bus->capacidad = $micro->nro_asientos;
        $bus->foto = $micro->foto;
        $bus->conductor = $conductor->nombre;
        $bus->linea = $linea->nombre;

        return response([
            'bus' => $bus
        ], 200);
    }
}
