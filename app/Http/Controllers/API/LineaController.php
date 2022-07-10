<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Linea;

class LineaController extends Controller
{
    public function getLineasAll() {
        $lineas = new Linea();
        $lineas = $lineas->getLineas();

        return response()->json($lineas);
    }
}
