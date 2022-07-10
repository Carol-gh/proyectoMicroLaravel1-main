@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="content">
<div class="col-12 col-md-8">

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">REGITRAR MICROBBUS</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">
      <form>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">PLACA</label>
        <input class="form-control" type="text" value="PK3HS" id="example-text-input">
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">ASIENTOS</label>
        <input class="form-control" type="search" value="20" id="example-search-input">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">MODELO</label>
        <input class="form-control" type="email" value="2015" id="example-email-input">
    </div>
    <div class="form-group">
        <label for="example-url-input" class="form-control-label">LINEA</label>
        <input class="form-control" type="url" value="10" id="example-url-input">
    </div>
    <div class="form-group">
        <label for="example-tel-input" class="form-control-label">NUMERO INTERNO</label>
        <input class="form-control" type="tel" value="40-(770)-888-444" id="example-tel-input">
    </div>
    <div class="form-group">
        <label for="example-password-input" class="form-control-label">FECHA ASIGNACION</label>
        <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00" id="example-datetime-local-input">
    </div>
    <div class="form-group">
        <label for="example-number-input" class="form-control-label">FECHA BAJA</label>
        <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00" id="example-datetime-local-input">
    </div>
    <div class="form-group">
        <label for="example-datetime-local-input" class="form-control-label">ESTADO</label>
        <input class="form-control" type="text" value="John Snow" id="example-text-input">
    </div>
   
</form>

<button class="btn btn-icon btn-primary" type="button">
	     
           <a href="#" class="btn-inner--text">Guardar</a>

            </button>
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