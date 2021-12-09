@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mb-3">
        <div class="col col-8">
            <p class="text-center" style="font-size: x-large">Gestión de Usuarios</p>
        </div>
    </div>
    <table class="table table">
        <thead>
            <tr>
                <th style="width: 10%" scope="col">Rut</th>
                <th style="width: 25%" scope="col">Nombre</th>
                <th style="width: 25%" scope="col">Email</th>
                <th style="width: 20%" scope="col">Rol</th>
                <th style="width: 20%" scope="col">Status</th>
                <th style="width: 20%" scope="col" colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $user)
            @if ($user->rol != 2)
            <tr>
                <th scope="row">{{$user->rut}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @if($user->rol==2)
                <td>Administrador</td>
                @elseif($user->rol == 1)
                <td>Jefe de carrera</td>
                @else
                <td>Estudiante</td>
                @endif
                @if($user->status == 1)
                <td>Habilitado</td>
                @else
                <td>Deshabilitado</td>
                @endif
                <td><a class="btn btn-warning" href={{ route('editarUsuario', ['id' => $user]) }}>Editar</a></td>

            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection
