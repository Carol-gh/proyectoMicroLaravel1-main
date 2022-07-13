<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Microbus;
use App\Models\MicroConductor;
use App\Models\Linea;
use App\Models\Conductor;
use App\Models\User;

class MicrobusController extends Controller
{
    public function createBus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'placa'=> 'required',
            'nroInterno' => 'required',
            'modelo' => 'required',
            'nro_asientos' => 'required',
            'linea_id' => 'required'
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

        return response()->json([
            'message' => 'Microbus creado',
            'microbus' => $microbus
        ], 401);
    }

    /**
     * Mostrar el listado de micros que el chofer ha conducido
     */
    public function getBusToday() {
        $userId = auth()->user()->id;
        $user = User::where(['id' => $userId])->first();
        $conductor = Conductor::where(['users_id' => $userId])->first();
        $conductorId = $conductor->id;

        //Obtener la lista de los micros conducidos por ese usuario
        $drivings = new MicroConductor();
        $drivings = $drivings->getBusesDrive($conductorId);

        //Obtener la fecha actual
        $now = Carbon::now();
        $fecha_actual = $now->format('Y-m-d');

        $buses = [];

        foreach ($drivings as $driving) {
            /**Comparar la fecha actual con la fecha de MicroConductor
             * Si es igual a la fecha actual obtener datos del micro
             */
            if ($fecha_actual == $driving->fecha) {
                $micro = Microbus::where(['id' => $driving->micro_id])->first();
                $linea = Linea::where(['id' => $micro->linea_id])->first();

                $bus = new \stdClass();
                $bus->conductor = $user->name;
                $bus->linea = $linea->nombre;
                $bus->id = $micro->id;
                $bus->placa = $micro->placa;
                $bus->modelo = $micro->modelo;
                $bus->interno = $micro->nroInterno;
                $bus->capacidad = $micro->nro_asientos;
                $bus->foto = $micro->foto;
                $bus->driving = $driving->id;

                array_push($buses, $bus);
            }
        }

        return response([
            'bus' => $buses
        ], 200);
    }

    public function getBuses(Request $request) {
        $micros = new Microbus();
        $micros = $micros->getBusesLineaX($request->linea);

        $buses = [];

        foreach ($micros as $micro) {
            $bus = new \stdClass();
            $bus->linea = $request->linea;
            $bus->id = $micro->id;
            $bus->placa = $micro->placa;
            $bus->modelo = $micro->modelo;
            $bus->interno = $micro->nroInterno;
            $bus->capacidad = $micro->nro_asientos;
            $bus->foto = $micro->foto;

            array_push($buses, $bus);
        }

        return response([
            'bus' => $buses
        ], 200);
    }

    public function asignBusDriver(Request $request) {
        $userId = auth()->user()->id;
        $microId = $request->micro_id;
        $now = Carbon::now();
        $fecha_actual = $now->format('Y-m-d');

        $driving = new MicroConductor();
        $driving->fecha = $fecha_actual;
        $driving->conductor_id = $userId;
        $driving->micro_id = $microId;
        $driving->save();

        return response()->json($driving);
    }
}
