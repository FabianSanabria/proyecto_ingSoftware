@extends('layouts.app')
@section('content')
@if (session('message'))
<script>
    Swal.fire({
    icon: 'success',
    title: 'Bien!',
    text: 'La contraseña se ha actualizado!',
    }).then(function() {
        location.href = location.href;
});
</script>
@endif
<div class="container">
    <div class="row justify-content-center">
        @if (Auth::user()->rol == 2)
        <div class ="card-deck">
            <div class="card">
                <i class="fas fa-users fa-10x text-center" style="color: #003057;"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Administrar usuarios</h5>
                    <small class="text-muted">Permite o crear/editar/deshabilitar usuarios del sistema.</small>
                </div>
                <div class="card-footer">
                    <a href="/usuario" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-graduation-cap fa-10x text-center"style="color: #003057;"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Administrar Carreras</h5>
                    <small class="text-muted">Permite crear y/o editar carreras en el sistema.</small>
                </div>
                <div class="card-footer">
                    <a href="/carrera" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
        </div>
        @endif
        @if (Auth::user()->rol == 1)
        <div class ="card-deck">
            <div class="card">
                <i class="fas fa-search fa-10x text-center" style="color: #003057;"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Buscar Estudiante</h5>
                    <small class="text-muted">Despliega informacion del estudiante a partir del Rut.</small>
                </div>
                <div class="card-footer">
                    <a href="/buscarEstudiante" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-check-double fa-10x text-center"style="color: #003057;" ></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Resolver solicitudes pendientes</h5>
                    <small class="text-muted">El sistema despliega las solicitudes que se encuentren en estado "Pendiente".</small>
                </div>
                <div class="card-footer">
                    <a href="/resolverSolicitud" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-cloud-upload-alt fa-10x text-center"style="color: #003057;" ></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Carga masiva de estudiantes</h5>
                    <small class="text-muted">El sistema permite al usuario realizar una carga masiva de estudiantes en formato excel.</small>
                </div>
                <div class="card-footer">
                    <a href="/cargamasiva" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
        </div>
        @endif
        @if (Auth::user()->rol == 0)
        <div class ="card-deck">
            <div class="card">
                <i class="fas fa-users fa-10x text-center" style="background-color: #003057;"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Generar solicitud</h5>
                    <small class="text-muted">Permite la creacion de solicitud especial al Jefe de Carrera.</small>
                </div>
                <div class="card-footer">
                    <a href="/solicitud-alumno" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-graduation-cap fa-10x text-center"style="background-color: #003057;" ></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Gestión de solicitud</h5>
                    <small class="text-muted">Permite gestionar o visualizar solicitudes ya creadas.</small>
                </div>
                <div class="card-footer">
                    <a href="/solicitud-alumno/lista" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
        </div>
        @endif
</div>
@endsection
