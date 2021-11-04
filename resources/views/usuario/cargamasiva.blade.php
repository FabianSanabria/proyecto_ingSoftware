
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <p class="text-center" style="font-size: x-large; text-align: center;">Carga Masiva</p>
        </div>
    </div>
    <div class = "row justify-content">
        <div class ="card-deck">
            <div class="card" style="width: 19rem;">
                <i class="fas fa-file-excel fa-10x text-center" style="color: #003057;"
                ></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Carga archivo excel</h5>
                    <small class="text-muted">Implementa una lista de usuarios a través de un archivo excel.</small>
                </div>
                <div class="card-body" >
                    <form name ="subirExcel" method="POST" enctype="multipart/form-data" action="{{route('users.import.excel')}}" >
                        @csrf
                        <div class ="form-group">
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
                                        title: 'Oops...',
                                        text: 'Archivo seleccionado no es valido!',
                                        footer : "Solo se admiten archivos .xlsx y .xls "
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
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 5%" scope="col">#</th>
                        <th style="width: 5%" scope="col">Agregado</th>
                        <th style="width: 20%" scope="col">Rut</th>
                        <th style="width: 30%" scope="col">Nombre</th>
                        <th style="width: 40%" scope="col">Carrera</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>





@endsection
