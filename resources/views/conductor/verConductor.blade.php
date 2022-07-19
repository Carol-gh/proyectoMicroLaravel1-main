@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="content">
</div>
@include('layouts.footers.auth')
<div class="container-fluid mt--7" style="padding-top: 50px;">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                <img style="" src="{{ asset('storage'.'/'.$conductor->foto) }}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                   
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">"{{isset($linea->nombre)? $linea->nombre:''}}"</span>
                                        <span class="description">{{ __('linea de micro') }}</span>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ $conductor->nombre }}<span class="font-weight-light"></span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ __($conductor->email) }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('CATEGORIA LICENCIA:' ) }}
                                <i class="ni education_hat mr-2"></i>{{ __($conductor->categoria_lic) }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('MICROBUS:' ) }}
                                <i class="ni education_hat mr-2"></i>"{{isset($linea->placa)? $linea->placa:''}}"
                            </div>
                            
                            <hr class="my-4" />
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Editar Perfil Conductor') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('conductorMicrobus.update',$conductor->id) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Conductor Informacion') }}</h6>
                            <div class="card-body">
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> Conductor  </label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                               class="form-control"
                                               name="nombre"
                                               value="{{isset($conductor->nombre)? $conductor->nombre:''}}" autofocus>
                                        @if ($errors->has('nombre'))
                                            <span class="error text-danger" for="input-nombre">
                                                {{ $errors->first('nombre') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> email  </label>
                                    <div class="col-sm-7">
                                        <input type="email"
                                               class="form-control"
                                               name="email"
                                               value="{{isset($conductor->email)? $conductor->email:''}}" autofocus>
                                        @if ($errors->has('email'))
                                            <span class="error text-danger" for="input-nombre">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> password </label>
                                    <div class="col-sm-7">
                                        <input type="password"
                                               class="form-control"
                                               name="password"
                                               value="{{isset($conductor->password)? $conductor->password:''}}" autofocus>
                                        @if ($errors->has('email'))
                                            <span class="error text-danger" for="input-nombre">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">CI</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="ci" class="form-control"
                                               id="ci" placeholder="ci"
                                               value="{{isset($conductor->ci)? $conductor->ci:''}}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> Telefono </label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                               class="form-control"
                                               name="telefono"
                                               value="{{isset($conductor->telefono)? $conductor->telefono:''}}" autofocus>
                                        @if ($errors->has('email'))
                                            <span class="error text-danger" for="input-nombre">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> categoria licencia </label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="categoria_lic"
                                                aria-label="Default select example">
                                            <option disabled selected>{{$conductor->categoria_lic}}</option>
                                                    <option value="{{  $conductor->categoria_lic }}">A </option>
                                                    <option value="{{  $conductor->categoria_lic }}"> B </option>
                                                    <option  value="{{  $conductor->categoria_lic }}">C </option>
                                                    <option  value="{{  $conductor->categoria_lic }}">M </option>
                                                    <option  value="{{  $conductor->categoria_lic }}">P </option>
                                                    <option  value="{{  $conductor->categoria_lic }}">T</option>
                                        </select>
                                    </div>
                                
                                </div>s
                                <!-- <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> PLACA </label>
                                    <div class="col-sm-7">
                                   
                                    <select class="form-control" name="microbus_id"
                                                aria-label="Default select example">
                                           <option disabled selected>"{{isset($linea->placa)? $linea->placa:''}}"</option>
                                     @foreach($microbus as $microbus)
                                       @if($microbus->estado == 'inactivo')
                                         <option value="{{isset($microbus->placa )? $microbus->placa: $linea->placa}}"> {{ $microbus->placa }}</option>
                                         @endif
                                      @endforeach  
                                    </select>
                                       
                                    </div>
                                </div> -->
                            </div>
                            <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush