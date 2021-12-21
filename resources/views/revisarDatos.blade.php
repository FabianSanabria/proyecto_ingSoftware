@extends('layouts.app')

@section('content')
@if (Auth::user()->rol == 1)
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="col-lg-12 login-title">
                Ver Datos Estudiante
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">


                        <div class="form-group">
                            <label class="form-control-label">Fecha de la solicitud</label>
                                <textarea class = "form-control" id = "updated_at" rows = "1" disabled>{{$solicitudes->updated_at}}</textarea>
                            @error('updated_at')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Número de la solicitud</label>
                                <input value={{$solicitudes->id}} id="id" type="text" class="form-control @error('id') is-invalid @enderror"
                                name="id" required disabled>
                            @error('id')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label class="form-control-label">Rut del estudiante</label>

                            @foreach ($listaEstudiantes as $estud)
                                @if ($estud->id == $solicitudes->estudiante_id)
                                    @foreach ($listaUsuarios as $user)
                                        @if ($user->id == $estud->usuario_id)
                                        <input value={{$user->rut}} id="rut" type="text" class="form-control @error('rut') is-invalid @enderror"
                                        name="rut" required disabled>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            @error('rut')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Nombre del estudiante</label>

                            @foreach ($listaEstudiantes as $estud)
                            @if ($estud->id == $solicitudes->estudiante_id)
                                @foreach ($listaUsuarios as $user)
                                    @if ($user->id == $estud->usuario_id)
                                    <textarea class = "form-control" id = "name" rows = "1" disabled>{{$user->name}}</textarea>
                                    @endif
                                @endforeach
                            @endif
                            @endforeach

                            @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Tipo de solicitud</label>

                                @switch($solicitudes->tipo)
                                @case(0)
                                    <input value="{{"Sobrecupo"}}"  type="text" class="form-control "
                                    required disabled>
                                    @break
                                @case(1)
                                    <input value="{{"Cambio paralelo"}}"  type="text" class="form-control "
                                    required disabled>
                                    @break
                                @case(2)
                                    <input value="{{"Eliminación asignatura"}}"  type="text" class="form-control "
                                    required disabled>
                                    @break
                                @case(3)
                                    <input value="{{"Inscripción asignatura"}}"  type="text" class="form-control "
                                    required disabled>
                                    @break
                                @case(4)
                                    <input value="{{"Ayudantía"}}"  type="text" class="form-control "
                                    required disabled>
                                    @break
                                @case(5)
                                    <input value="{{"Facilidades"}}"  type="text" class="form-control "
                                    required disabled>
                                    @break
                                @default
                                @endswitch


                            @error('tipo')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Correo electronico del estudiante</label>

                            @foreach ($listaEstudiantes as $estud)
                            @if ($estud->id == $solicitudes->estudiante_id)
                                @foreach ($listaUsuarios as $user)
                                    @if ($user->id == $estud->usuario_id)
                                    <input value={{$user->email}} id="email" type="text" class="form-control"
                                    name="email" readonly>
                                    @endif
                                @endforeach
                            @endif
                            @endforeach

                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Teléfono del estudiante</label>
                                <input value={{$solicitudes->numero_de_telefono}} id="numero_de_telefono" type="text" class="form-control @error('numero_de_telefono') is-invalid @enderror"
                                name="numero_de_telefono" required disabled>
                            @error('numero_de_telefono')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for = "exampleFormControlTextarea">Detalle de la solicitud</label>
                            <textarea class = "form-control" id = "exampleFormControlTextArea" rows = "5" disabled>{{$solicitudes->detalle}}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Nombre de la asignatura</label>
                                <textarea class = "form-control" id = "nombre_asignatura" rows = "1" disabled>{{$solicitudes->nombre_asignatura}}</textarea>
                            @error('nombre_asignatura')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        @if($solicitudes->tipo == 4)
                        <div class="form-group">
                            @foreach ($ayudantias as $ayud)
                            @if( $solicitudes->id == $ayud->solicitud_id)

                            <label class="form-control-label">Nota de aprobación</label>
                            <input value={{$ayud->nota_aprobacion}} id="notaAprobacion" type="text" class="form-control"
                            name="notaAprobacion" readonly>

                            <label class="form-control-label">Cantidad de ayudantias</label>
                            <input value={{$ayud->cant_ayudantias}} id="cantAyudantias" type="text" class="form-control"
                            name="cantAyudantias" readonly>

                            @endif
                            @endforeach
                        </div>
                        @endif

                        @if($solicitudes->tipo == 5)

                        <div class="form-group">
                            @foreach ($facilidades as $fac)
                            @if( $solicitudes->id == $fac->solicitud_id)

                            <label class="form-control-label">Nombre del profesor</label>
                            <input value={{$fac->nombre_profesor}} id="nombreProfesor" type="text" class="form-control"
                            name="nombreProfesor" readonly>

                            @foreach ($archivos as $arch)
                            @if ($fac->id == $arch->facilidad_id)
                                <label class="form-control-label">Archivo Adjunto</label>
                                <a href="/download/{{$arch->nombre_archivo}}">
                                <button type="button" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-download">Descargar</i></button>
                                </a>
                                <input value={{$arch->nombre_archivo}} id="nombreArchivo" type="text" class="form-control"
                                name="nombreArchivo" readonly>
                            @endif
                            @endforeach

                            @endif
                            @endforeach
                        </div>
                        @endif
                        <div class="form-group">
                            <label for = "exampleFormControlTextarea">Estado</label>
                            @if($solicitudes->estado == 0)
                            <input value= 'Pendiente' type="text" class="form-control"
                            required disabled>
                            @elseif ($solicitudes->estado == 1)
                            <input value= 'Aceptada' type="text" class="form-control"
                            required disabled>
                            @elseif ($solicitudes->estado == 2)
                            <input value= 'Aceptada con Observaciones' type="text" class="form-control"
                            required disabled>
                            @elseif ($solicitudes->estado == 3)
                            <input value= 'Rechazada' type="text" class="form-control"
                            required disabled>
                            @else
                            <input value= 'Anulada' type="text" class="form-control"
                            required disabled>
                            @endif
                        </div>

                        <div class="form-group">
                            @if($solicitudes->estado == 2 || $solicitudes->estado == 3)
                            <label class="form-control-label">Observaciones</label>
                            <textarea class = "form-control" rows = "4" required disabled>{{$solicitudes->respuestaSolicitud}}</textarea>
                            @endif
                        </div>

                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="button" onclick="history.back()"class="btn btn-outline-primary">{{ __('Volver') }}</button>
                            </div>
                        </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>

    @endif
    @endsection
