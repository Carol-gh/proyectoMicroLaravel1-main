<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Microbus;
use App\Models\Linea;
use App\Models\Conductor;
use App\Models\MicroConductor;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ConductorControllerA extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function view()
    {  $conductor = Conductor::all();
        return view('conductor.view', compact('conductor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $user_id= Auth::user()->id;
        $conductor = DB::table('users')
        ->join('conductor', 'users.id', '=', 'conductor.users_id')
        ->join('linea','users.linea_id','=','linea.id') 
        ->select('conductor.*', 'linea.nombre')
        ->where('users.id',$user_id)
       ->get();
        return view('conductor.create', compact('conductor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendData(Request $request)
    {   $conductor=request()->except('_token');
        $conductor['users_id'] = Auth::user()->id;
        if($request->hasfile('foto')){
            $conductor['foto'] = $request->file('foto')->store('uploads','public');
        }
        Conductor::insert($conductor);
   
       return  redirect()->route('conductorMicrobus.view'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conductor $conductor)
    {  echo $conductor->id;
       if (!is_null($conductor->foto)) {    
          Storage::disk('public')->delete($conductor->foto);
        }

       $conductor->delete();
       return  redirect()->route('conductorMicrobus.view'); 
    }
}
