@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<div class="content">
    <div class="container-fluid" style="padding-top: 30px;">

        <div class="row">

<div class="col-md-12">
<div class="table">
    <div class="row">
         <div class="col-sm-12">
           <button class="btn btn-icon btn-primary" type="button">
	        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
           <a href="{{ route('conductorMicrobus.create') }}" class="btn-inner--text">Registrar chofer</a>

            </button>
          </div>    
       </div>
     </div>  

     <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">codigo</th>
      <th scope="col">cedula identidad</th>
      <th scope="col">foto</th>
      <th scope="col">linea</th>
      <th scope="col">categoria</th>
      <th scope="col">acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($conductor as $conductor)   
    <tr>
      <th scope="row">{{$conductor->id}}</th>
      <td>{{$conductor->ci}}</td>
      <td>
      <div class="img-container">
          <img style="width: 25%" src="{{ asset('storage'.'/'.$conductor->foto) }}" alt="...">
      </div>
      </td>
      <td>{{$conductor->nombre}}</td>
      <td>{{$conductor->categoria_lic}}</td>
       <td class="px-6 py-4 text-center">              
      
       <button type="button" class="btn btn-outline-success"> ver o editar</button>
    
        <form  action="{{ url('Conductor/eliminarConductor',$conductor->id) }}" method="POST">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-outline-danger" type="submit" onclick="return confirm('¿quieres borrar el conductor?')" value="Borrar">
          </form>
            
        </td>
    </tr>
    @endforeach 
</tbody>
</table>
          
    </div> 
    @include('layouts.footers.auth')
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush