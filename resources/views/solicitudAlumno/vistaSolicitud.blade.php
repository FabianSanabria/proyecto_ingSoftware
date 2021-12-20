@extends('layouts.app')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(!empty($successMsg))
    <div class="alert alert-success">
        {{ $successMsg }}
    </div>
@endif

<div class="container">
    <div class="row mb-4">
        <div class="col col-2">

        </div>
        <div class="col col-7">
            <p class="text-center" style="font-size: x-large">Mis Solicitudes</p>
        </div>
        <div class="col col-3">
            <a class="btn btn-success btn-block" href="{{ route('nuevaSolicitud') }}"> <i class="fas fa-plus"></i> Nueva
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

            @foreach ($listaEstudiantes as $estudiante)
            @if ($estudiante->usuario_id == Auth::user()->id)

            @forelse ($solicitud as $solicitud)

            @if ($solicitud->estudiante_id == $estudiante->id)
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
                        Solicitud de ayudantía
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
                    <td><a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="editar" href={{
                    route('editarSolicitud', ['id' => $solicitud]) }}><i class="far fa-edit"></i></a></td>

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
                @case(4)
                <td>
                    <div class="alert alert-danger" role="alert">
                        Anulada
                    </div>
                </td>
                @break

                @default

                @endswitch

            </tr>
            @endif

            @empty
            <tr>
                <td colspan="5">
                    <p>No hay solicitudes ingresadas.</p>
                </td>
            </tr>
            @endforelse


            @endif

            @endforeach


        </tbody>
    </table>

</div>

@endsection
