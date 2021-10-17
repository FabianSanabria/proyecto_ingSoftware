@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mb-3">
        <div class="col col-8">
            <p class="text-center" style="font-size: x-large">Gestion de Usuarios</p>
        </div>
    </div>
    <table class="table table">
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
            @foreach ($usuarios as $user)
            <tr>
                <th scope="row">{{$user->rut}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->rol}}</td>
                <td><a class="btn btn-primary" href={{ route('editarUsuario', ['rut' => $user]) }}>editar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
