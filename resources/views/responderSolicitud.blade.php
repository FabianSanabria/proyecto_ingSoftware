@extends('layouts.app')

@section('content')
@if (session('message'))
<script>
    Swal.fire({
    icon: 'success',
    title: '¡Bien!',
    text: '¡La respuesta se ha enviado!',
    })
</script>
@endif
@if (Auth::user()->rol == 1)
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="col-lg-12 login-title">
                Resolver solicitud
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
                            <label class="form-control-label">Correo electrónico del estudiante</label>

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
                            <textarea class = "form-control" id = "nombreProfesor" name = "nombreProfesor" rows = "1" disabled>{{$fac->nombre_profesor}}</textarea>

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

                    <form method="POST" action="{{route('actualizarSolicitud',['id' => $solicitudes])}}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="form-control-select">Estado</label>
                            <select class="form-control" name="tipoRespuesta" id="tipoRespuesta">
                                <option value = "Aceptada">Aceptada</option>
                                <option value = "AceptadaCon">Aceptada con observaciones</option>
                                <option value = "Rechazada">Rechazada</option>
                            </select>
                            @error('tipoRespuesta')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Observaciones</label>
                            <textarea class = "form-control" name="observaciones" id = "observaciones" rows = "4"></textarea>
                            @error('observaciones')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-outline-primary">{{ __('Responder') }}</button>
                            </div>
                        </div>

                        <script type = "text/javascript">
                        const estado = document.getElementById('tipoRespuesta');
                        const observacion = document.getElementById('observaciones');

                        estado.addEventListener('change',() =>
                        {
                            if(estado.value === "AceptadaCon" || estado.value === "Rechazada")
                            {
                                observacion.required = true;
                            }else
                            {
                                observacion.required = false;
                            }
                        })
                        </script>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>

    @endif
    @endsection
