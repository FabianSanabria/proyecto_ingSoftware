@extends('layouts.app')
@section('content')
@if (Auth::user()->rol == 0)
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fas fa-chalkboard-teacher" style="position: relative; right: 205px; top:4px"></i>
            </div>
            <div class="col-lg-12 login-title" style="position: relative; right: 205px; top:4px">
                GENERAR SOLICITUD
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <div class="form-group row">


                    </div>
                    <form id="formulario" method="POST" action="{{ route('tipoSolicitud') }}">
                        @csrf
                        <div class="form-group row">

                            <div class="col-md-6">
                                <label for="tipoSolicitud" class="col-md-8 col-form-label text-md-right"style="position: relative; right: 205px; top:4px">TIPO DE SOLICITUD</label>
                                <select name="tipoSolicitud" id= "tipoSolicitud"style="position: relative; bottom: 25px;border:1px solid #ccc; padding: 3px;border-radius: 10px;"aria-describedby="validationServer04Feedback" required >
                                    <option selected value="Sobrecupo">Solicitud de sobrecupo</option>
                                    <option value="Cambio paralelo"> Solicitud de cambio de paralelo</option>
                                    <option value="Eliminación asignatura">Solicitud de eliminación de asignatura</option>
                                    <option value="Inscripción asignatura"> Solicitud de inscripción de asignatura</option>
                                    <option value="Ayudantía">Solicitud de ayudantía</option>
                                    <option value="Facilidades">Facilidades académicas</option>
                                </select>
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    @error('tipoSolicitud')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button id="enviar1" class="btn btn-outline-primary"style="position: relative; right: 210px; bottom:20px">{{ __('Desplegar formulario') }}</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>

    </div>

@endif

@endsection
