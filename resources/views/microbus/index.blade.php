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
           <a href="{{route('microbus.create')}}" class="btn-inner--text">Registrar Microbus</a>

            </button>
          </div>    
       </div>
     </div>  
     <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">FOTO</th>
      <th scope="col">PLACA</th>
      <th scope="col">NRO INTERNO</th>
      <th scope="col">ESTADO</th>
      <th scope="col ">ACCION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($microbus as $microbus)
  <tr>
      <th scope="row">{{$microbus->id}}</th>
      <td>
      <div class="img-container">
          <img style="width: 40%" src="{{ asset('storage'.'/'.$microbus->foto) }}" alt="...">
      </div>
      </td>
      <td>{{$microbus->placa}}</td>
      <td>{{$microbus->nroInterno}}</td>
      <td>{{$microbus->estado}}</td>
      <td class="px-6 py-4 text-center">              
            <button type="button" class="btn btn-outline-success"> ver o editar</button>
            <button type="button" class="btn btn-outline-danger">eliminar</button> </span> 
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