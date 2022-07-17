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
    public function getBus($id) {
        $conductor = Conductor::findOrFail($id);
        $user = User::where(['id' => $conductor->users_id])->first();
        $linea = Linea::where(['id' => $user->linea_id])->first();
        $micro = Microbus::where(['id' => $conductor->microbus_id])->first();

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
