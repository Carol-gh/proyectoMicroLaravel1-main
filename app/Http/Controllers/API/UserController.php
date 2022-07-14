<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validate(),
            ['password' => bcrypt($request->password)]
        ));

        $user->linea = $request->linea;
        $user->save();

        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ]);
    }

    public function login(Request $request)
    {
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (!Auth::attempt($attrs)) {
            return response([
                'error' => 'Unauthorized'
            ], 401);
        }

        $user = auth()->user();
        $conductor = Conductor::where(['users_id' => $user->id])->first();
        $token = auth()->user()->createToken('secret')->plainTextToken;

        return response([
            'user' => $user,
            'conductor' => $conductor,
            'token' => $token
        ], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Successfully logged out'
        ], 200);
    }

    public function user() {
        return response([
            'user' => auth()->user()
        ], 200);
    }

    public function update(Request $request) {
        $attrs = $request->validate([
            'name' => 'required|string'
        ]);

        auth()->user()->update([
            'name' => $attrs['name'],
        ]);

        return response([
            'message' => 'User updated',
            'user' => auth()->user()
        ], 200);
    }

    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index');

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validate(),
            ['password' => bcrypt($request->password)]
        ));

        $user->linea = $request->linea;
        $user->save();

        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ]);
    }
}
