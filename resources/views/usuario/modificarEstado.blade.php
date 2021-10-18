@extends('layouts.app')

@section('content')

@if (Auth::user()->rol == 2)
<div class="container">
    <div class="row mb-3">

        <div class="col col-8">
            <p class="text-center" style="font-size: x-large">Gestión de Usuarios</p>
        </div>

    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th style="width: 10%" scope="col">Rut</th>
                <th style="width: 25%" scope="col">Nombre</th>
                <th style="width: 25%" scope="col">Email</th>
                <th style="width: 20%" scope="col">Rol</th>
                <th style="width: 20%" scope="col" colspan="3">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <th scope="row">{{$usuario->rut}}</th>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->rol}}</td>

                <td><a class="btn btn-info" href={{ route('reestablecerCont', ['id' => $usuario]) }}>Reestablecer Contraseña</a></td>
                @if ($usuario->status === 1)
                    <td><a class="btn btn-warning" href={{ route('cambiarEstado', ['id' => $usuario]) }}>deshabilitar</a></td>
                @else
                    <td><a class="btn btn-info" href={{ route('cambiarEstado', ['id' => $usuario]) }}>habilitar</a></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    @if ($usuarios->links())
        <div class="d-flex justify-content-center">
            {!! $usuarios->links() !!}
        </div>
    @endif

</div>

@else
@php
header("Location: /home" );
exit();
@endphp
@endif


@endsection
