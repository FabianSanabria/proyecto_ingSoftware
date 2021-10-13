@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Auth::user()->rol == 2)
        <div class ="card-deck">
            <div class="card">
                <i class="fas fa-users fa-10x text-center" style ="color:dodgerblue"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Administrar usuarios</h5>
                    <small class="text-muted">Permite o crear/editar/deshabilitar usuarios del sistema.</small>
                </div>
                <div class="card-footer">
                    <a href="/usuario" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-graduation-cap fa-10x text-center"style ="color:dodgerblue"></i>
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
</div>
@endsection
