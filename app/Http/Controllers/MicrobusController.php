<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Microbus;
use App\Models\Linea;
use App\Models\Conductor;

class MicrobusController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'placa'=> 'required',
            'nroInterno' => 'required',
            'fecha_asignacion' => 'required|date',
            'conductor_id' => 'required',
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
        $microbus->modelo = $request->modelo;
        $microbus->nro_asientos = $request->nro_asientos;
        $microbus->fecha_baja = $request->fecha_baja;
        $microbus->save();

        return response()->json([
            'message' => 'Microbus creado',
            'microbus' => $microbus
        ], 401);
    }

    public function getLineasAll() {
        $lineas = new Linea();
        $lineas = $lineas->getLineas();

        return response()->json($lineas);
    }

    public function getBus($conductorId) {
        $bus = new Microbus();
        $bus = $bus->getBus($conductorId);

        $linea = Linea::where(['id' => $bus->linea_id])->first();
        $conductor = Conductor::where(['id' => $conductorId])->first();

        $microbus = new \stdClass();
        $microbus->id = $bus->id;
        $microbus->placa = $bus->placa;
        $microbus->modelo = $bus->modelo;
        $microbus->nroInterno = $bus->nroInterno;
        $microbus->nro_asientos = $bus->nro_asientos;
        $microbus->foto = $bus->foto;
        $microbus->linea = $linea->nombre;
        $microbus->conductor = $conductor->nombre;

        return response()->json($microbus);
    }
}
