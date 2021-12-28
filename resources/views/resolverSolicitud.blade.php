@extends('layouts.app')

@section('content')
@if (session('message'))
<script>
    Swal.fire({
    icon: 'success',
    title: '¡Bien!',
    text: '¡La respuesta se ha enviado!',
    })
</script>
@endif
@if (Auth::user()->rol == 1)
<div class="container">
    <div class="col col-2">
        <a href="https://youtu.be/4OMq65GuL90">Tutorial de como Resolver una solicitud Pendiente</a>
    </div>
    <div class="row mb-3">
        <div class="col col-13">
            <p class="text-center" style="font-size: x-large">Gestión de solicitudes</p>
        </div>
    </div>
    <table class="table table">
        <thead>
            <tr>
                <th style="width: 20%" scope="col">Fecha y hora</th>
                <th style="width: 20%" scope="col">Número de solicitud</th>
                <th style="width: 20%" scope="col">Rut del estudiante</th>
                <th style="width: 20%" scope="col">Nombre del estudiante</th>
                <th style="width: 20%" scope="col">Tipo</th>
                <th style="width: 20%" scope="col" colspan="1">Gestión</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jefesdecarreras as $jefeC)
            @if($jefeC->usuario_id == Auth::user()->id)

            @foreach ($solicitud->sortBy('updated_at') as $solicitud)
            @foreach ($listaCarreras as $carrera)

            @if(($carrera->jefe_carrera_id == $jefeC->id))

            @if ($solicitud->estado == 0 && $solicitud->carrera_id == $carrera->id)
            <tr>
                <th scope="row">{{$solicitud->updated_at}}</th>
                <td>{{$solicitud->id}}</td>
                @foreach ($listaEstudiantes as $estud)
                    @if ($estud->id == $solicitud->estudiante_id)
                        @foreach ($user as $us)
                            @if ($us->id == $estud->usuario_id)
                                <td>{{$us->rut}}</td>
                                <td>{{$us->name}}</td>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @switch($solicitud->tipo)
                    @case(0)
                        <td>{{"Sobrecupo"}}</td>
                        @break
                    @case(1)
                        <td>{{"Cambio paralelo"}}</td>
                        @break
                    @case(2)
                        <td>{{"Eliminación asignatura"}}</td>
                        @break
                    @case(3)
                        <td>{{"Inscripción asignatura"}}</td>
                        @break
                    @case(4)
                        <td>{{"Ayudantía"}}</td>
                        @break
                    @case(5)
                        <td>{{"Facilidades"}}</td>
                        @break
                    @default
                @endswitch
                <td><a class="btn btn-primary" href={{ route('responderSolicitud', ['id' => $solicitud]) }}>Gestionar</a></td>
            </tr>
            @endif
            @endif
            @endforeach


            @endforeach

            @endif
            @endforeach
        </tbody>
    </table>
</div>

@endif
@endsection
