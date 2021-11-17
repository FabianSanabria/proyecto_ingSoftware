@extends('layouts.app')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container">
    <div class="row mb-4">
        <div class="col col-3">
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('carrera.index') }}">
                <input class="form-control mr-sm-2" name="search" id="search" type="search"
                    placeholder="Buscar por número de solicitud" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i
                        class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="col col-7">
            <p class="text-center" style="font-size: x-large">Mis Solicitudes</p>
        </div>
        <div class="col col-2">
            <a class="btn btn-success btn-block" href="{{ route('solicitudAlumno.create') }}"> <i class="fas fa-plus"></i> Nueva
                Solicitud</a>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 15%" scope="col">Fecha Solicitud</th>
                <th style="width: 20%" scope="col">Número Solicitud</th>
                <th style="width: 30%" scope="col">Tipo Solicitud</th>
                <th style="width: 20%" scope="col">Estado</th>
                <th style="width: 10%" scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($solicitudes as $solicitud)
            <tr>
                <th scope="row">{{ ($solicitud->created_at)}}</th>
                <td>{{ ($solicitud->id)}}</td>
                @switch(($solicitud->tipo))
                @case(0)
                <td>
                        Sobrecupo
                    </div>
                </td>
                @break
                @case(1)
                <td>
                        Cambio de paralelo
                    </div>
                </td>
                @break
                @case(2)
                <td>
                        Eliminación de asignatura
                    </div>
                </td>
                @break
                @case(3)
                <td>
                        Inscripción de asignatura
                    </div>
                </td>
                @break
                @case(4)
                <td>
                        Solicitud de ayudantia
                    </div>
                </td>
                @break
                @case(5)
                <td>
                        Facilidades académicas
                    </div>
                </td>
                @break

                @default

                @endswitch

                @switch(($solicitud->estado))
                @case(0)
                <td>
                    <div class="alert alert-warning" role="alert">
                        Pendiente
                    </div>
                </td>
                @break
                @case(1)
                <td>
                    <div class="alert alert-success" role="alert">
                        Aceptada
                    </div>
                </td>
                @break
                @case(2)
                <td>
                    <div class="alert alert-success" role="alert">
                        Aceptada con observaciones
                    </div>
                </td>
                @break
                @case(3)
                <td>
                    <div class="alert alert-danger" role="alert">
                        Rechazada
                    </div>
                </td>
                @break

                @default

                @endswitch
                <td><a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="editar" href={{
                        route('solicitud.gestion', [$solicitud]) }}><i class="far fa-edit"></i></a></td>
            </tr>
            @empty
            <tr>
                <td colspan="5">
                    <p>No hay solicitudes ingresadas</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
