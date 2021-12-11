<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DescargarArchivosController extends Controller
{
    public function download($nombre_archivo)
    {
        $ubicacion_archivo = storage_path('app/public/archivos/'.$nombre_archivo);

        if (file_exists($ubicacion_archivo)) //Verificamos que el archivo exista.
        {
            //Descargar
            return response()->download($ubicacion_archivo);
        } else {
            //Error
            exit('El archivo requerido no existe en el sistema.');
        }
    }
}
