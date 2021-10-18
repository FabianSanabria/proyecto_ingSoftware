@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mb-3">
        <div class="col col-2">
            <form method="GET" action="{{ route('carrera.index') }}">
                <span style="margin:10px"> Ingrese rut del Estudiante  <span>
                <input type="text" name="search" id="search" style="margin:10px; border: 4px solid powderblue">
                    <button class="btn btn-primary" style="position:relative; left:50px;">Buscar</button>
            </form>
        </div>

    </div>
    <div class="container">
        <div class="row mb-3">
            <span>Nombre:  </span>
        </div>
        <div class="row mb-3">
            <span>Rut:  </span>
        </div>
        <div class="row mb-3">
            <span>Carrera:  </span>
        </div>
        <div class="row mb-3">
            <span>Correo Electronico:  </span>
        </div>
    </div>

    <table class="table table">
        <thead>
            <tr>
                <th style="width: 10%" scope="col">Código</th>
                <th style="width: 70%" scope="col">Nombre</th>
                <th style="width: 20%" scope="col" colspan="1">Accion</th>
            </tr>
        </thead>

    </table>
</div>



@endsection
