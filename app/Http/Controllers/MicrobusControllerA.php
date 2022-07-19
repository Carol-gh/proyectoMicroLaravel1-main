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
        $datos['microbus'] = Microbus::all();
        return view('microbus.index',$datos);
    }

    public function create()
    {  $microbus = Microbus::all();
        return view('microbus.create');
    }


    public function sendData(Request $request)
    {  $microbus=request()->except('_token');
        if($request->hasfile('foto')){
            //$microbus['foto'] = $request->file('foto')->store('uploads','public');
            $microbus['foto'] = Storage::disk('public')->put('imagenes', $request->foto);
        }
        Microbus::insert($microbus);
        return  redirect()->route('microbus.index');

    }

    public function getLineasAll() {
        $lineas = Linea::all();
        return view('microbus.create',compact('lineas'));
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
