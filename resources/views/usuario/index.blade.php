@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="row mb-4">

        <div class="col">
            <p class="text-center" style="font-size: x-large; text-align: center;">Administrar Usuarios</p>
        </div>
    </div>
    <div class ="card-deck">
        <div class="card">
            <i class="fas fa-user-plus fa-10x text-center" style="color: #003057;"
            ></i>
            <div class="card-body">
                <h5 class="card-title text-center">Crear</h5>
                <small class="text-muted">Permite crear estudiantes y jefes de carrera.</small>
            </div>
            <div class="card-footer">
                <a href="/crearUsuario" class="btn btn-info btn-block">IR</a>
            </div>
        </div>
        <div class="card">
            <i class="	far fa-edit fa-10x text-center"style="color: #003057;"
            ></i>
            <div class="card-body">
                <h5 class="card-title text-center">Editar Datos</h5>
                <small class="text-muted">Permite modificar datos de los usuarios.</small>
            </div>
            <div class="card-footer">
                <a href="/lista-usuarios-editar" class="btn btn-info btn-block">IR</a>
            </div>
        </div>
        <div class="card">
            <i class="fas fa-users-cog fa-10x text-center"style="color: #003057;"
            ></i>
            <div class="card-body">
                <h5 class="card-title text-center">Gestión de usuarios.</h5>
                <small class="text-muted">Permite habilitar o deshabilitar usuarios. Y Reestablecer contraseñas.</small>
            </div>
            <div class="card-footer">
                <a href="/modificarEstado" class="btn btn-info btn-block">IR</a>
            </div>
        </div>
    </div>
</div>



@endsection
