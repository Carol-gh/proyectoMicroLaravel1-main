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
      <th scope="col">nombre</th>
      <th scope="col">email</th>
      <th scope="col">telefono</th>
      <th scope="col">CATEGORIA</th>
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
          <img style="width:20%" src="{{ asset('storage'.'/'.$conductor->foto) }}" alt="...">
      </div>
      </td>
      <td>{{$conductor->nombre}}</td>
      <td>{{$conductor->email}}</td>
      <td>{{$conductor->telefono}}</td>
      <td>{{$conductor->categoria_lic}}</td>
       <td class="px-6 py-4 text-center">              
      
   
       <form  action="{{ route('conductorMicrobus.detalle',$conductor->id) }}" method="GET">
           <input class="btn btn-outline-success" type="submit"  value="ver">

          </form>
        <form  action="{{ route('conductorMicrobus.eliminar',$conductor->id) }}" method="POST">
        {{ csrf_field() }}
        @method('DELETE')
            <input class="btn btn-outline-danger" type="submit"  value="eliminar">
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