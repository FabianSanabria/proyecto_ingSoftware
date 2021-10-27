@extends('layouts.app')
@section('content')
@if (Auth::user()->rol == 0)
<div class="container">

        @if ($solicitud == 0)
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="PUT" action="{{ route('solicitud-alumno.create',['solicitud'=>$solicitud]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese su numero de telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nrc" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese NRC de la asignatura') }}</label>

                                <div class="col-md-6">
                                    <input id="nrc" type="text" class="form-control @error('nrc') is-invalid @enderror" name="nrc" value="{{ old('nrc') }}" required autocomplete="rut">

                                    @error('nrc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese nombre de la asignatura') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="motivo" class="col-md-4 col-form-label text-md-right">{{ __('Explique en detalle el porque de la solicitud de sobrecupo') }}</label>

                                <div class="col-md-6">
                                        <textarea name="motivo" id="motivo" style= " width: 100%;
                                        height: 150px;
                                        padding: 12px 20px;
                                        box-sizing: border-box;
                                        border: 2px solid #ccc;
                                        border-radius: 4px;
                                        background-color: #f8f8f8;
                                        font-size: 16px;
                                        resize: none;"></textarea>
                                    @error('motivo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden"name="solicitud" value="{{ $solicitud }}">

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="boton" name= "boton" type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

            @elseif ($solicitud == 1)
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="PUT" action="{{ route('solicitud-alumno.create',['solicitud'=>$solicitud]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese su numero de telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nrc" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese NRC de la asignatura') }}</label>

                                <div class="col-md-6">
                                    <input id="nrc" type="text" class="form-control @error('nrc') is-invalid @enderror" name="nrc" value="{{ old('nrc') }}" required autocomplete="rut">

                                    @error('nrc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese nombre de la asignatura') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="motivo" class="col-md-4 col-form-label text-md-right">{{ __('Explique en detalle el porque de la solicitud de cambio de paralelo') }}</label>

                                <div class="col-md-6">
                                        <textarea name="motivo" id="motivo" style= " width: 100%;
                                        height: 150px;
                                        padding: 12px 20px;
                                        box-sizing: border-box;
                                        border: 2px solid #ccc;
                                        border-radius: 4px;
                                        background-color: #f8f8f8;
                                        font-size: 16px;
                                        resize: none;"></textarea>
                                    @error('motivo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden"name="solicitud" value="{{ $solicitud }}">

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="boton" name= "boton" type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

            @elseif ($solicitud == 2)
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="PUT" action="{{ route('solicitud-alumno.create',['solicitud'=>$solicitud]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese su numero de telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nrc" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese NRC de la asignatura') }}</label>

                                <div class="col-md-6">
                                    <input id="nrc" type="text" class="form-control @error('nrc') is-invalid @enderror" name="nrc" value="{{ old('nrc') }}" required autocomplete="rut">

                                    @error('nrc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese nombre de la asignatura') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="motivo" class="col-md-4 col-form-label text-md-right">{{ __('Explique en detalle el porque de la solicitud de eliminacion de asignatura') }}</label>

                                <div class="col-md-6">
                                        <textarea name="motivo" id="motivo" style= " width: 100%;
                                        height: 150px;
                                        padding: 12px 20px;
                                        box-sizing: border-box;
                                        border: 2px solid #ccc;
                                        border-radius: 4px;
                                        background-color: #f8f8f8;
                                        font-size: 16px;
                                        resize: none;"></textarea>
                                    @error('motivo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden"name="solicitud" value="{{ $solicitud }}">

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="boton" name= "boton" type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

            @elseif ($solicitud == 3)
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="PUT" action="{{ route('solicitud-alumno.create',['solicitud'=>$solicitud]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese su numero de telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nrc" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese NRC de la asignatura') }}</label>

                                <div class="col-md-6">
                                    <input id="nrc" type="text" class="form-control @error('nrc') is-invalid @enderror" name="nrc" value="{{ old('nrc') }}" required autocomplete="rut">

                                    @error('nrc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese nombre de la asignatura') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="motivo" class="col-md-4 col-form-label text-md-right">{{ __('Explique en detalle el porque de la solicitud de inscripcion de la asignatura') }}</label>

                                <div class="col-md-6">
                                        <textarea name="motivo" id="motivo" style= " width: 100%;
                                        height: 150px;
                                        padding: 12px 20px;
                                        box-sizing: border-box;
                                        border: 2px solid #ccc;
                                        border-radius: 4px;
                                        background-color: #f8f8f8;
                                        font-size: 16px;
                                        resize: none;"></textarea>
                                    @error('motivo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden"name="solicitud" value="{{ $solicitud }}">

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="boton" name= "boton" type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

            @elseif ($solicitud == 4)
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="PUT" action="{{ route('solicitud-alumno.create',['solicitud'=>$solicitud]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese su numero de telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nombreAsignatura" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese nombre de la asignatura') }}</label>

                                <div class="col-md-6">
                                    <input id="nombreAsignatura" type="text" class="form-control @error('nombreAsignatura') is-invalid @enderror" name="nombreAsignatura" value="{{ old('nombreAsignatura') }}" required autocomplete="nombreAsignatura">

                                    @error('nombreAsignatura')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nota" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese calificacion con la que aprobo la asignatura') }}</label>

                                <div class="col-md-6">
                                    <input id="nota" type="text" class="form-control @error('nota') is-invalid @enderror" name="nota" value="{{ old('nota') }}" required autocomplete="nota" autofocus>

                                    @error('nota')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cantidadAyudantias" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese cantidad de ayudantias que ha realizado durante su vida universitaria (en total, entre todas sus ayudantias), si no ha realizado ingrese 0') }}</label>

                                <div class="col-md-6">
                                    <input id="cantidadAyudantias" type="text" class="form-control @error('cantidadAyudantias') is-invalid @enderror" name="cantidadAyudantias" value="{{ old('cantidadAyudantias') }}" required autocomplete="cantidadAyudantias" autofocus>

                                    @error('cantidadAyudantias')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="motivo" class="col-md-4 col-form-label text-md-right">{{ __('¿Por qué desea ser ayudante de la asignatura?') }}</label>

                                <div class="col-md-6">
                                        <textarea name="motivo" id="motivo" style= " width: 100%;
                                        height: 150px;
                                        padding: 12px 20px;
                                        box-sizing: border-box;
                                        border: 2px solid #ccc;
                                        border-radius: 4px;
                                        background-color: #f8f8f8;
                                        font-size: 16px;
                                        resize: none;"></textarea>
                                    @error('motivo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden"name="solicitud" value="{{ $solicitud }}">

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="boton" name= "boton" type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

            @elseif ($solicitud == 5)
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="PUT" action="{{ route('solicitud-alumno.create',['solicitud'=>$solicitud]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese su numero de telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="facilidadAcademica" class="col-md-8 col-form-label text-md-right">Tipo de solicitud</label>
                                    <select name="facilidadAcademica" id= "facilidadAcademica"style="position: relative;left:260px; bottom: 30px;border:1px solid #ccc; padding: 3px;border-radius: 10px;"aria-describedby="validationServer04Feedback" required >
                                    <option selected value="LicMedCertMed">Licencia Médica o Certificado Médico</option>
                                        <option value="InasistenciaFM"> Inasistencia por Fuerza Mayor</option>
                                        <option value="RepresentacionUniv">Representación de la Universidad</option>
                                        <option value="InasistenciaxMotFamOPers"> Inasistencia a clases por motivos familiares o personales</option>
                                    </select>
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        @error('tipoSolicitud')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nombreProfesor" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese nombre del profesor de la asignatura') }}</label>

                                <div class="col-md-6">
                                    <input id="nombreProfesor" type="text" class="form-control @error('nombreProfesor') is-invalid @enderror" name="nombreProfesor" value="{{ old('nombreProfesor') }}" required autocomplete="nombreProfesor">

                                    @error('nombreProfesor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombreAsignatura" class="col-md-4 col-form-label text-md-right">{{ __('Ingrese nombre de la asignatura') }}</label>

                                <div class="col-md-6">
                                    <input id="nombreAsignatura" type="text" class="form-control @error('nombreAsignatura') is-invalid @enderror" name="nombreAsignatura" value="{{ old('nombreAsignatura') }}" required autocomplete="nombreAsignatura" autofocus>

                                    @error('nombreAsignatura')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="motivo" class="col-md-4 col-form-label text-md-right">{{ __('Explique en detalle el porque de la solicitud') }}</label>

                                <div class="col-md-6">
                                        <textarea name="motivo" id="motivo" style= " width: 100%;
                                        height: 150px;
                                        padding: 12px 20px;
                                        box-sizing: border-box;
                                        border: 2px solid #ccc;
                                        border-radius: 4px;
                                        background-color: #f8f8f8;
                                        font-size: 16px;
                                        resize: none;"></textarea>
                                    @error('motivo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden"name="solicitud" value="{{ $solicitud }}">

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="boton" name= "boton" type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

            @endif

    </div>
    <script>
        const button = document.getElementById('boton');
        const form = document.getElementById('formulario')
        button.addEventListener('click', function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro que quieres ingresar la solicitud?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Enviar',
                denyButtonText: `Cancelar envio`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    form.submit();
                    } else if (result.isDenied) {
                    Swal.fire('Envio cancelado', '', 'info')
                }
            })
        })
    </script>
@endif

@endsection
