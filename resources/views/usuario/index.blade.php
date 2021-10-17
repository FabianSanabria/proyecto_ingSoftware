@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mb-4">

        <div class="col">
            <p class="text-center" style="font-size: x-large; text-align: center;">Administrar Usuarios</p>
        </div>
    </div>
    <div class ="card-deck">
        <div class="card">
            <i class="fas fa-users fa-10x text-center" style ="color:dodgerblue"></i>
            <div class="card-body">
                <h5 class="card-title text-center">Crear</h5>
                <small class="text-muted">Permite crear estudiantes y jefes de carrera.</small>
            </div>
            <div class="card-footer">
                <a href="/crearUsuario" class="btn btn-info btn-block">IR</a>
            </div>
        </div>
        <div class="card">
            <i class="fas fa-graduation-cap fa-10x text-center"style ="color:dodgerblue"></i>
            <div class="card-body">
                <h5 class="card-title text-center">Editar Datos</h5>
                <small class="text-muted">Permite modificar datos de los usuarios.</small>
            </div>
            <div class="card-footer">
                <a href="/lista-usuarios-editar" class="btn btn-info btn-block">IR</a>
            </div>
        </div>
        <div class="card">
            <i class="fas fa-graduation-cap fa-10x text-center"style ="color:dodgerblue"></i>
            <div class="card-body">
                <h5 class="card-title text-center">Habilitar / Desabilitar</h5>
                <small class="text-muted">Permite habilitar o deshabilitar usuarios.</small>
            </div>
            <div class="card-footer">
                <a href="/modificarEstado" class="btn btn-info btn-block">IR</a>
            </div>
        </div>
        <div class="card">
            <i class="fas fa-graduation-cap fa-10x text-center"style ="color:dodgerblue"></i>
            <div class="card-body">
                <h5 class="card-title text-center">Reiniciar Clave</h5>
                <small class="text-muted">Permite reiniciar clave de usuario a clave.</small>
            </div>
            <div class="card-footer">
                <a href="/carrera" class="btn btn-info btn-block">IR</a>
            </div>
        </div>
    </div>
</div>



@endsection
