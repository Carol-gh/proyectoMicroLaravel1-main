<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Conductor;


class ConductorController extends Controller
{
    /* public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ci' => 'required',
            'fecha_nacimiento'=> 'required|date',
            'categoria_lic' => 'required',
            'telefono' => 'required',
            'users_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $conductor = Conductor::create(
            array_merge($validator->validate(),),
        );

        $image = $this->saveImage($request->foto, 'imagenes');
        $conductor->foto = $image;
        $conductor->save();

        return response()->json([
            'message' => 'Conductor creado',
            'conductor' => $conductor
        ], 401);
    }

    public function createDriver(Request $request)
    {
        $userId = auth()->user()->id;
        $image = $this->saveImage($request->foto, 'imagenes');

        $attrs = $request->validate([
            'ci' => 'required',
            'fecha_nacimiento'=> 'required|date',
            'categoria_lic' => 'required',
            'telefono' => 'required',
        ]);

        $conductor = Conductor::create([
            'ci' => $attrs['ci'],
            'fecha_nacimiento'=> $attrs['fecha_nacimiento'],
            'categoria_lic' => $attrs['categoria_lic'],
            'telefono' => $attrs['telefono'],
            'foto' => $image,
            'users_id' => $userId
        ]);

        return response()->json([
            'message' => 'Conductor creado',
            'conductor' => $conductor
        ], 401);
    } */
}
