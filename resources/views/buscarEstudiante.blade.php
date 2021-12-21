@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mb-4">
        <div class="col">
            <p class="text-center" style="font-size: x-large; text-align: center;">Buscar Información Estudiante</p>
        </div>
    </div>
    @if ($error== 1)
    <script>
        Swal.fire({
        icon: 'error',
        title: '¡Error!',
        text: 'El RUT ingresado no existe.',
        }).then(function() {
            location.href="buscarEstudiante";
    });
    </script>
    @endif
    <div class="card-group d-flex align-items-center">
        <div class="card-body " style="width: 5rem">
            <form method="GET" action="{{ route('buscarEstudiante') }}">
                <span style="margin:10px"> Ingrese rut del Estudiante :<span>
                <input type="text" placeholder="Ej: 21344994K" pattern="[0-9K]+" name="search" id="search" style="margin:10px; border: 4px solid powderblue">
                    <button class="btn btn-primary" style="position:relative; left:10px;">Buscar</button>
            </form>

        </div>
        <div class="card-body ">
            <div class="input-group input-group-sm mb-2">
                <span> Nombre: </span>
                <input value='{{$nombre}}' type="text" class="form-control" style="right:0.01rem;" readonly>
            </div>
            <div class="input-group input-group-sm mb-2">
                <span>Rut:  </span>
                <input value='{{$rut}}' type="text" class="form-control" readonly>
            </div>
            <div class="input-group input-group-sm mb-2">
                <span>Carrera:  </span>
                <input value='{{$carrera}}' type="text" class="form-control" readonly>
            </div>
            <div class="input-group input-group-sm mb-2">
                <span>Correo Electronico:  </span>
                <input value='{{$email}}' type="text" class="form-control"  readonly>
            </div>
        </div>

    </div>


    <table class="table table">
        <thead>
            <tr>
                <th style="width: 20%" scope="col">Fecha y hora</th>
                <th style="width: 5%" scope="col">N° Solicitud</th>
                <th style="width: 15%" scope="col">Rut del estudiante</th>
                <th style="width: 20%" scope="col">Nombre del estudiante</th>
                <th style="width: 20%" scope="col">Tipo</th>
                <th style="width: 20%" scope="col" colspan="1">Revisar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jefesdecarreras as $jefeC)
            @if($jefeC->usuario_id == Auth::user()->id)

            @foreach ($solicitud->sortBy('created_at') as $solicitud)
            @foreach ($listaCarreras as $carrera)

            @if(($carrera->jefe_carrera_id == $jefeC->id))

            @if ( $solicitud->carrera_id == $carrera->id)
            <tr>
                <th scope="row">{{$solicitud->created_at}}</th>
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
                <td><a class="btn btn-primary" href={{ route('verDatos', ['id' => $solicitud]) }}>Revisar</a></td>
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



@endsection
