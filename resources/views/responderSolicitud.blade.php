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
                Resolver solicitud
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form method="POST" action="{{route('actualizar.datos',['id' => $usuario])}}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="form-control-label">Fecha de la solicitud</label>


                                <input value={{$solicitudes->updated_at}} id="updated_at" type="text" class="form-control @error('updated_at') is-invalid @enderror"
                                name="updated_at" required disabled>


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

                            @foreach ($listaUsuarios as $listaU)
                            @if( $listaU->id == $solicitudes->estudiante_id)
                            <input value={{$listaU->rut}} id="rut" type="text" class="form-control @error('rut') is-invalid @enderror"
                            name="rut" required disabled>
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

                            @foreach ($listaUsuarios as $listaU)
                            @if( $listaU->id == $solicitudes->estudiante_id)
                            <input value={{$listaU->name}} id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" required disabled>
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

                            @foreach ($listaUsuarios as $listaU)
                            @if( $listaU->id == $solicitudes->estudiante_id)
                            <input value={{$listaU->email}} id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                            name="email" readonly>
                            @endif
                            @endforeach

                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Teléfono del estudiante</label>

                                <input value={{$solicitudes->numero_de_telefono}} id="numero_de_telefono" type="text" class="form-control @error('numero_de_telefono') is-invalid @enderror"
                                name="numero_de_telefono" required disabled>


                            @error('id')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for = "exampleFormControlTextarea">Detalle de la solicitud</label>
                            <textarea class = "form-control" id = "exampleFormControlTextArea" rows = "5" disabled>

                                {{$solicitudes->detalle}}

                            </textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Observaciones</label>
                            <textarea class = "form-control" id = "respuestaSolicitud" rows = "4" required>

                            </textarea>
                            @error('respuestaSolicitud')
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
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>

    @endif
    @endsection
