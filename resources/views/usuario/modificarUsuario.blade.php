@extends('layouts.app')

@section('content')
@if (Auth::user()->rol == 2)
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="col-lg-12 login-title">
                EDITAR USUARIO
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form method="POST" action="{{route('actualizar.datos',['id' => $usuario])}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-control-label">RUT</label>
                            <input value={{$usuario->rut}} id="rut" type="text" class="form-control @error('rut') is-invalid @enderror"
                                name="rut" required disabled>

                            @error('rut')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">NOMBRE</label>
                            <input value="{{$usuario->name}}" name="nombre" id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                             required>

                            @error('nombre')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">CORREO ELECTRÓNICO</label>
                            <input value="{{$usuario->email}}" id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" required>

                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">
                                <label class="form-control-label">CARRERA</label>
                                <select name="carrera" id ="carrera" class="form-control">

                                    @foreach ($carreras as $carrera)

                                    @if( $carrera->id == $carrera_usuario)
                                    <option selected  value="{{$carrera->id}}">{{$carrera->nombre}}</option>
                                    @else
                                    <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>

                                    @endif
                                    @endforeach
                                </select>
                                <div id="validation" class="text-danger">
                                    @error('carrera')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>





                        <div class="form-group row">

                            <div class="col-md-6">
                                <label class="form-control-label">ROL</label>
                                <select name="rol" id ="rol" class="form-control">

                                    @if( $usuario->rol == 1)
                                    <option selected value="1">Jefe de Carrera</option>

                                    @else
                                    <option value="1">Jefe de Carrera</option>

                                    @endif
                                    @if( $usuario->rol == 0)
                                    <option selected value="0">Estudiante</option>

                                    @else
                                    <option  value="0">Estudiante</option>

                                    @endif

                                </select>
                                <div id="validation" class="text-danger">
                                    @error('rol')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-outline-primary">{{ __('Editar') }}</button>
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
