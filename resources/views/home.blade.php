@extends('layouts.app')
@section('content')
@if (session('message'))
<script>
    Swal.fire({
    icon: 'success',
    title: 'Bien!',
    text: 'La contraseña se ha actualizado!',
    })
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
                <i class="fas fa-users fa-10x text-center" style="background-color: #003057;"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Buscar Estudiante</h5>
                    <small class="text-muted">Despliega informacion del estudiante a partir del Rut.</small>
                </div>
                <div class="card-footer">
                    <a href="/buscarEstudiante" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-graduation-cap fa-10x text-center"style="background-color: #003057;" ></i>
                <div class="card-body">
                    <h5 class="card-title text-center">A</h5>
                    <small class="text-muted">En proceso.</small>
                </div>
                <div class="card-footer">
                    <a href="/carrera" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
        </div>
        @endif
</div>
@endsection
