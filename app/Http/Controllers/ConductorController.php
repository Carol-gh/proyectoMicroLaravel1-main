<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Conductor;


class ConductorController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
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

        //$conductor->telefono = $request->telefono;
        $image = $this->saveImage($request->foto, 'imagenes');
        $conductor->foto = $image;
        $conductor->save();

        return response()->json([
            'message' => 'Conductor creado',
            'conductor' => $conductor
        ], 401);
    }
}
