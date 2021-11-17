
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row mb-4">
        <div class="col">
            <p class="text-center" style="font-size: x-large; text-align: center;">Carga Masiva Estudiantes</p>
        </div>
    </div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    @if(session()->has('errors'))
    <div class="alert alert-danger">
        <li>{{$errors->first() }}</li>
    </div>
    @endif
    <div class = "row justify-content">
        <div class ="card-deck ">
            <div class="card" style="width: 19rem;">
                <i class="fas fa-file-excel fa-10x text-center" style="color: #003057;"
                ></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Carga Masiva Estudiantes</h5>
                    <h6 class="text-muted text-center">El archivo Excel debe contener 4 columnas correspondientes a estas: Carrera,Rut,Nombre y Correo.</h6>
                </div>
                <div class="card-body  position: absolute" style =" top:240px">
                    <form  name ="subirExcel" method="POST" enctype="multipart/form-data" action="{{route('users.import.excel')}}" >
                        @csrf
                        <div class ="form-group" >
                            <label for = "tittle">Escoger Excel</label>
                            <input id ='file' type = "file" name="file" class ="form-control" accept="file/xlsx, file/xls"onchange="return validateExtension()"/>
                            <script>
                                function validateExtension(){
                                    var fileInput = document.getElementById('file');
                                    var filePath = fileInput.value;
                                    var allowedExtensions = /(\.xlsx|\.xls)$/i;
                                    if(!allowedExtensions.exec(filePath)){
                                        Swal.fire({
                                        icon: 'error',
                                        title: 'Error...',
                                        text: '¡Archivo seleccionado no es válido!',
                                        footer : "Solo se admiten archivos .xlsx y .xls (Excel)"
                                        })
                                        fileInput.value = '';
                                        const button = document.getElementById('cargaExcel');
                                        button.disabled = true;
                                        return false;
                                    }else{
                                        const button = document.getElementById('cargaExcel');
                                        button.disabled = false;
                                    }
                                }
                            </script>
                            </div>
                            <button id='cargaExcel' type="submit" disabled class ="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
        <div class="card" style="width: 60rem;">

            <table id="tablaExcel" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 4%" scope="col">Agregado SI/NO</th>
                        <th style="width: 10%" scope="col">Código Carrera</th>
                        <th style="width: 10%" scope="col">Rut</th>
                        <th style="width: 25%" scope="col">Nombre</th>
                        <th style="width: 26%" scope="col">Correo</th>
                        <th style="width: 25%" scope="col">Error</th>
                    </tr>
                </thead>
                @if (session()->has('failures'))
                @foreach (session()->get('failures') as $validation)
                    <tr>
                        <td style="text-align: center; background-color:#ffd4d4">NO,Fila{{$validation->row()}}</td>
                        @if ($validation->values()['carrera']== '')
                        <td style="background-color:#ffd4d4">INCOMPLETO</td>
                        @else
                        <td style="background-color:#ffd4d4">{{ $validation->values()['carrera'] }}</td>
                        @endif
                        @if ($validation->values()['rut']== '')
                        <td style="background-color:#ffd4d4">INCOMPLETO</td>
                        @else
                        <td style="background-color:#ffd4d4">{{ $validation->values()['rut'] }}</td>
                        @endif
                        @if ($validation->values()['nombre']== '')
                        <td style="background-color:#ffd4d4">INCOMPLETO</td>
                        @else
                        <td style="background-color:#ffd4d4">{{ $validation->values()['nombre'] }}</td>
                        @endif
                        @if ($validation->values()['correo']== '')
                        <td style="background-color:#ffd4d4">INCOMPLETO</td>
                        @else
                        <td style="background-color:#ffd4d4">{{ $validation->values()['correo'] }}</td>
                        @endif
                        <td style="background-color:#ffd4d4">
                            <ul>
                                @foreach ($validation->errors() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                @endif
                @foreach ($userImport as $user_excel)
                <tr>
                        <td style="text-align: center;" style="background-color:white">SI</td>
                        <td style="background-color:white">{{ $user_excel->carrera}}</td>
                        <td style="background-color:white">{{ $user_excel->rut }}</td>
                        <td style="background-color:white">{{ $user_excel->nombre}}</td>
                        <td style="background-color:white">{{ $user_excel->correo }}</td>
                        <td style="background-color:white">DATOS CORRECTOS</td>
                <tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<?php
$con = mysqli_connect('localhost', 'root', '','proyecto');
mysqli_query($con, 'TRUNCATE TABLE `user_excels`');

?>

@endsection
