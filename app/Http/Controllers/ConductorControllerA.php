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
        $conductor =  DB::table('users')
        ->join('conductor', 'users.id', '=', 'conductor.users_id')
        ->join('microbus', 'microbus.id', '=', 'conductor.microbus_id')
        ->join('linea','users.linea_id','=','linea.id') 
        ->select('conductor.*', 'linea.*','microbus.*')
        ->where('users.id',$user_id)
       ->first();
       if(!empty($conductor->microbus_id)){
         Microbus::where('id','=',$conductor->microbus_id)->update(['estado'=>'activo']);
       }
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
        $estado=microbus::where('estado','=','inactivo')->get();
        Conductor::insert($conductor);
          
        $microbus=Microbus::all();
       return  redirect()->route('conductorMicrobus.view', ['estado'=>$estado])->with(compact('microbus',$microbus)); 
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
        
        $conductor = Conductor::find($id); 
        $user_id= Auth::user()->id;
        $linea =  DB::table('users')
        ->join('conductor', 'users.id', '=', 'conductor.users_id')
        ->join('microbus', 'microbus.id', '=', 'conductor.microbus_id')
        ->join('linea','users.linea_id','=','linea.id') 
        ->select('conductor.*', 'linea.*','microbus.*')
        ->where('users.id',$user_id)
       ->first();
       $microbus= Microbus::all();

      
       return view('conductor.verConductor', ['conductor'=>$conductor],['linea'=>$linea])->with(compact('microbus',$microbus));
    
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
    {   $datosConductor=request()->except(['_token','_method']);
        if($request->hasfile('foto')){
            $conductor = Conductor::findOrfail($id); 
            Storage::disk('public')->delete($conductor->foto);
            $datosConductor['foto'] = $request->file('foto')->store('uploads','public');
        }
       
       /*  $dm =DB::table('microbus')
        ->join('conductor', 'conductor.microbus_id', '=', 'microbus.id')
        ->where('conductor.id',$id)->update(['estado'=>'inactivo']);

       
        $idm=Microbus::select('id')->where('microbus.placa','=',$request->microbus_id)->first();
        $datosConductor['microbus_id'] =$idm->id;
        Microbus::where('id','=',$idm->id)->update(['estado'=>'activo']); */

        Conductor::where('id','=',$id)->update($datosConductor);
        $conductor = Conductor::findOrFail($id); 
        $microbus= Microbus::all();
        return view('conductor.verConductor', ['conductor'=>$conductor])->with(compact('microbus',$microbus));
       
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
