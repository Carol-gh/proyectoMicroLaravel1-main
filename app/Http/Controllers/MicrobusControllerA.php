<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Models\Microbus;
use App\Models\Linea;
use App\Models\Conductor;

class MicrobusControllerA extends Controller
{
  
       public function index()
    {
        $microbus = Microbus::all();
        return view('microbus.index',compact('microbus'));
    }
    
    public function create()
    {
        return view('microbus.create');
    }


    public function sendData(Request $request)
    {  

        $microbus= new Microbus();
        $microbus->placa = $request->input('placa');
        $microbus->modelo = $request->input('modelo');
        $microbus->nroInterno = $request->input('nroInterno');
        $microbus->nro_asientos = $request->input('nro_asientos');
        $microbus->fecha_asignacion = $request->input('fecha_asignacion');
        $microbus->fecha_baja = $request->input('fecha_baja');
        $microbus->foto = $request->input('foto');
        $microbus->estado = $request->input('estado');
        $microbus->linea = $request->input('linea');
        $microbus->conductor = $request->input('conductor');

   
       return  $microbus;
    }

    public function getLineasAll() {

        $lineas = Linea::all();
        return $lineas; 
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
        $microbus->linea = $linea->nombre;
        $microbus->conductor = $conductor->nombre;

        return response()->json($microbus);
    }

   
}
