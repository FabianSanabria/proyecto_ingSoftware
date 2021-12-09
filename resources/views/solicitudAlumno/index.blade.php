@extends('layouts.app')
@section('content')
@if (Auth::user()->rol == 0)
<div class="container">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
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
                                <label for="solicitud" class="col-md-8 col-form-label text-md-right"style="position: relative; right: 205px; top:4px">TIPO DE SOLICITUD</label>
                                <select name="solicitud" id= "solicitud"style="position: relative; bottom: 25px;border:1px solid #ccc; padding: 3px;border-radius: 10px;"aria-describedby="validationServer04Feedback" required >
                                    <option selected disabled value="10">Seleccione tipo de solicitud </option>
                                    <option value="0"> Solicitud de sobrecupo</option>
                                    <option value="1"> Solicitud de cambio de paralelo</option>
                                    <option value="2">Solicitud de eliminación de asignatura</option>
                                    <option value="3"> Solicitud de inscripción de asignatura</option>
                                    <option value="4">Solicitud de ayudantía</option>
                                    <option value="5">Facilidades académicas</option>
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
                                <button disabled id="enviar1" class="btn btn-outline-primary"style="position: relative; right: 210px; bottom:20px">{{ __('Desplegar formulario') }}</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>

    </div>

@endif
<script>
    const tipo = document.getElementById('solicitud').add;
    document.getElementById("solicitud").addEventListener("change", function() {
        document.getElementById("enviar1").disabled = false;

});


</script>
@endsection
