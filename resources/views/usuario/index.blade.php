@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mb-3">

        <div class="col col-8">
            <p class="text-center" style="font-size: x-large">Administrar Usuarios</p>
        </div>
        <div class="card-footer">
            <a href="/crearUsuario" class="btn btn-info btn-block">Crear Usuario</a>
        </div>
    </div>
    <table class="table table">
        <thead>
            <tr>
                <th style="width: 10%" scope="col">Código</th>
                <th style="width: 70%" scope="col">Nombre</th>
                <th style="width: 20%" scope="col" colspan="1">Accion</th>
            </tr>

    </table>
</div>



@endsection
