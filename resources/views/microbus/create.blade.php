@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="content">
<div class="col-12 col-md-8">

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">REGISTRAR MICROBBUS</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">
      <form action="{{route('microbus.register') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
     @csrf 
     <div class="form-group">
        <label for="example-datetime-local-input" class="form-control-label">FOTO</label>
        <input class="form-control" name = 'foto' type="text" value="{{old('foto')}}" id="foto" required>
    </div>      
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">PLACA</label>
        <input class="form-control" name ='placa' type="text" value="{{old('placa')}}" id="placa" required>
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">MODELO</label>
        <input class="form-control" name ='modelo' type="text" value="{{old('modelo')}}" id="modelo" required>
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">ASIENTOS</label>
        <input class="form-control" name ='nro_asientos' type="text" value="{{old('nro_asientos')}}" id="nro_asientos" required>
    </div>
    <div class="form-group">
        <label for="example-tel-input" class="form-control-label">NUMERO INTERNO</label>
        <input class="form-control" name ='nroInterno' type="text" value="{{old('nroInterno')}}" id="nroInterno" required>
    </div>
    <div class="form-group">
        <label for="example-password-input" class="form-control-label">FECHA ASIGNACION</label>
        <input class="form-control" name ='fecha_asignacion' type="datetime-local" value="fecha_asignacion" id="example-datetime-local-input" >
    </div>
    <div class="form-group">
        <label for="example-number-input" class="form-control-label">FECHA BAJA</label>
        <input class="form-control" name='fecha_baja' type="datetime-local" value="fecha_baja" id="example-datetime-local-input" >
    </div>
    <div class="form-group">
        <label for="example-datetime-local-input" class="form-control-label">ESTADO</label>
        <input class="form-control" name= 'estado' type="text" value="{{old('estado')}}" id="estado" required>
    </div>
   
    <label for="example-datetime-local-input" class="form-control-label">enviar</label>
        <input class="form-control" type="submit" value="guardar">
      
</form>

      </th>


    </tr>
   
  </tbody>
</table>
</div>
</div>
@include('layouts.footers.auth')

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush