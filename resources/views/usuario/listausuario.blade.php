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
                <th style="width: 70%" scope="col">Nombre</th>
                <th style="width: 20%" scope="col" colspan="1">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $User)
            <tr>
                <th scope="row">{{$User->rut}}</th>
                <td>{{$User->name}}</td>
                <td><a class="btn btn-primary" href={{ route('usuario.edit', [$User]) }}>editar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
