@extends('layouts.app')

@section('content')
@if (session('error'))
<script>
    Swal.fire({
    icon: 'success',
    title: 'Bien!',
    text: 'La contraseña se ha reestablecido!',
    }).then(function() {
        location.href = location.href;
});
</script>
@endif
@if (Auth::user()->rol == 2)
<div class="container">
    <div class="row mb-3">

        <div class="col col-8">
            <p class="text-center" style="font-size: x-large">Gestión de Usuarios</p>
        </div>

    </div>
    <table class="table table-light">
        <thead>
            <tr>
                <th style="width: 10%" scope="col">Rut</th>
                <th style="width: 25%" scope="col">Nombre</th>
                <th style="width: 25%" scope="col">Email</th>
                <th style="width: 20%" scope="col">Rol</th>
                <th style="width: 20%" scope="col">Status</th>
                <th style="width: 20%" scope="col" colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            @if($usuario->rol != 2)
            <tr>
                <th scope="row">{{$usuario->rut}}</th>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                @if($usuario->rol==2)
                <td>Administrador</td>
                @elseif($usuario->rol == 1)
                <td>Jefe de carrera</td>
                @else
                <td>Estudiante</td>
                @endif
                @if($usuario->status == 1)
                <td>Habilitado</td>
                @else
                <td>Deshabilitado</td>
                @endif
                <td><a class="btn btn-info" href={{ route('reestablecerCont', ['id' => $usuario]) }}>Reestablecer Contraseña</a></td>
                @if ($usuario->status === 1)
                    <td><a class="btn btn-warning" href={{ route('cambiarEstado', ['id' => $usuario]) }}>Deshabilitar</a></td>
                @else
                    <td><a class="btn btn-info" href={{ route('cambiarEstado', ['id' => $usuario]) }}>Habilitar</a></td>
                @endif
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @if ($usuarios->links())
        <div class="d-flex justify-content-center">
            {!! $usuarios->links() !!}
        </div>
    @endif

</div>

@else
@php
header("Location: /home" );
exit();
@endphp
@endif


@endsection
