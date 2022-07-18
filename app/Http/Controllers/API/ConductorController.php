<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Conductor;


class ConductorController extends Controller
{
    public function loginApp(Request $request)
    {
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $conductor = Conductor::where([
            'email' => $attrs['email'],
            'password' => $attrs['password']
        ])->first();

        if ($conductor == null) {
            return response([
                'error' => 'Unauthorized'
            ], 401);
        }

        return response([
            'conductor' => $conductor,
        ], 200);
    }

    public function getConductor($id) {
        $conductor = Conductor::findOrFail($id);

        return response([
            'conductor' => $conductor
        ], 200);
    }
}
