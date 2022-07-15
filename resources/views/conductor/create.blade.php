@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="content">
<div class="col-12 col-md-8">

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">REGITRAR CONDUCTOR</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">
      <form action="{{route('conductorMicrobus.register') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
      @csrf 
      <div class="form-group">
        <label for="example-text-input" class="form-control-label">CEDULA IDENTIDAD</label>
        <input class="form-control"  name="ci" type="text" value="{{old('ci')}}" id="ci" required>
    </div>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">FECHA NACIMIENTO</label>
        <input class="form-control" name ='fecha_nacimiento' type="datetime-local" value="{{old('fecha_nacimiento')}}" id="example-datetime-local-input" required>
    </div>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">TELEFONO</label>
        <input class="form-control" name="telefono" type="text" value="{{old('telefono')}}" id="telefono">
    </div>
    <div class="form-group">
        <label for="eexample-text-input" class="form-control-label">CATEGORIA LICENCIA</label>
        <input class="form-control" name="categoria_lic" type="text" value="{{old('categoria_lic')}}" id="categoria_lic" required>
    </div>

    <br>
        <div class="row">
                <label for="nombre" class="col-sm-2 col-form-label">FOTO</label>
                            <div class="col-sm-7">
                                <input type="file" name="foto" class="form-control"
                               id="exampleInputEmail" placeholder="Seleccione una imagen..."
                                     accept=".jpg, .jpeg, .png" value="{{ old('foto') }}">
                                    </div>

                                </div>
                                <br>

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