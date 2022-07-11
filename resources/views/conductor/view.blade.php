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
      <th scope="col">codgo</th>
      <th scope="col">nombre del chofer</th>
      <th scope="col">telefono</th>
      <th scope="col">categoria</th>
      <th scope="col">acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
       <td class="px-6 py-4 text-center">              
            <button type="button" class="btn btn-outline-success"> ver o editar</button>
            <button type="button" class="btn btn-outline-danger">eliminar</button> </span> 
        </td>
    </tr>
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