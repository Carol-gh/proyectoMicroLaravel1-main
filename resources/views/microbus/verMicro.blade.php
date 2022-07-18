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
                                <img style="" src="{{ asset('storage'.'/'.$microbus->foto) }}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                   
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">"{{isset($microbus->placa)? $microbus->placa:''}}"</span>
                                        <span class="description">{{ __('placa de micro') }}</span>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
							<i class="ni business_briefcase-24 mr-2"></i>{{ __('MODELO:' ) }}
                                {{ $microbus->modelo }}<span class="font-weight-light"></span>
                            </h3>
                            <div class="h5 font-weight-300">
							 <i class="ni business_briefcase-24 mr-2"></i>{{ __('NUMERO ASIENTOS:' ) }}
                                <i class="ni location_pin mr-2"></i>"{{isset($microbus->nro_asientos)? $microbus->nro_asientos:''}}"
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('INTERNO:' ) }}
                                <i class="ni education_hat mr-2"></i>"{{isset($microbus->nroInterno)? $microbus->nroInterno:''}}"
                            </div>
							<div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('ESTADO:' ) }}
                                <i class="ni education_hat mr-2"></i>"{{isset($microbus->estado)? $microbus->estado:''}}"
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
                            <h3 class="mb-0">{{ __('Editar Perfil Microbus') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('microbus.update',$microbus->id) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Microbus Informacion') }}</h6>
                        
                            <div class="card-body">
						
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> Microbus  </label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                               class="form-control"
                                               name="placa"
                                               value="{{isset($microbus->placa)? $microbus->placa:''}}" autofocus>
                                        @if ($errors->has('placa'))
                                            <span class="error text-danger" for="input-nombre">
                                                {{ $errors->first('placa') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> modelo  </label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                               class="form-control"
                                               name="modelo"
                                               value="{{isset($microbus->modelo)? $microbus->modelo:''}}" autofocus>
                                        @if ($errors->has('modelo'))
                                            <span class="error text-danger" for="input-nombre">
                                                {{ $errors->first('modelo') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> Interno </label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                               class="form-control"
                                               name="nroInterno"
                                               value="{{isset($microbus->nroInterno)? $microbus->nroInterno:''}}" autofocus>
                                        @if ($errors->has('nroInterno'))
                                            <span class="error text-danger" for="input-nombre">
                                                {{ $errors->first('nroInterno') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
								<div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> Estado </label>
                                    <div class="col-sm-7">
									<td>
											@if($microbus->estado == 'Inactivo')
											<span class="text-danger">{{$microbus->estado}}</span>
											@else
											<span class="text-success">{{$microbus->estado}}</span>
											@endif
										</td>
                      		                  <input type="text"
                                               class="form-control"
                                               name="estado"
                                               value="{{isset($microbus->estado)? $microbus->estado:''}}" autofocus>
                                        @if ($errors->has('estado'))
                                            <span class="error text-danger" for="input-estado">
                                                {{ $errors->first('estado') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                 
                                 
                                <br>
                              
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