<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Carrera;
use App\Rules\ValidarRut;
use App\Models\Estudiante;
use App\Models\user_excel;
use App\Rules\validarEmail;
use App\Rules\existeCarrera;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel,SkipsOnError,WithValidation,SkipsOnFailure, WithEvents,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable,SkipsErrors,SkipsFailures,RegistersEventListeners;

    //funcion que verifica ciertas validaciones antes de importar
    public static function beforeImport(BeforeImport $event)
    {
        //contadores para obtener la cantidad de filas de cada columna
        $contadorFilasA=0;
        $contadorFilasB=0;
        $contadorFilasC=0;
        $contadorFilasD=0;
       //obtiene la ultima columna que contiene dato, para validar celdas no requeridas
        $columna = $event->reader->getDelegate()->getActiveSheet()->getHighestdataColumn();
       //para obtener la cantidad de filas mayor que contiene una columna
        $cantidadEnA=$event->reader->getDelegate()->getActiveSheet()->getHighestRow();

        //obtienen los primeros valores de cada Celda
        $valorCeldaA = $event->reader->getDelegate()->getActiveSheet()->getCell('A1')->getValue();
        $valorCeldaB= $event->reader->getDelegate()->getActiveSheet()->getCell('B1')->getValue();
        $valorCeldaC = $event->reader->getDelegate()->getActiveSheet()->getCell('C1')->getValue();
        $valorCeldaD = $event->reader->getDelegate()->getActiveSheet()->getCell('D1')->getValue();

        //for para la columna A  que calcula la cantidad de elementos que contiene
        for($i=1;$i<=$cantidadEnA;$i++){
            $columnaA='A';
            $celdaA =  $columnaA.$i;
            $datoCeldaA = $event->reader->getDelegate()->getActiveSheet()->getCell($celdaA)->getValue();

            if($datoCeldaA!= null){
                $contadorFilasA++;
            }
        }

        //for para la columna B que calcula la cantidad de elementos que contiene
        for($i=1;$i<=$cantidadEnA;$i++){
            $columnaB='B';
            $celdaB =  $columnaB.$i;
            $datoCeldaB = $event->reader->getDelegate()->getActiveSheet()->getCell($celdaB)->getValue();
            if($datoCeldaB != null){
                $contadorFilasB++;
            }
        }
       //for para la columna C que calcula la cantidad de elementos que contiene
        for($i=1;$i<=$cantidadEnA;$i++){
            $columnaC='C';
            $celdaC =  $columnaC.$i;
            $datoCeldaC = $event->reader->getDelegate()->getActiveSheet()->getCell($celdaC)->getValue();
            if($datoCeldaC!= null){
                $contadorFilasC++;
            }
        }
        //for para la columna D que calcula la cantidad de elementos que contiene
        for($i=1;$i<=$cantidadEnA;$i++){
            $columnaD='D';
            $celdaD =  $columnaD.$i;
            $datoCeldaD = $event->reader->getDelegate()->getActiveSheet()->getCell($celdaD)->getValue();
            if($datoCeldaD!= null){
                $contadorFilasD++;
            }
        }
        //revisa si el archivo excel está vacio
        if($contadorFilasA == 0 and $contadorFilasB == 0 and $contadorFilasC == 0 and $contadorFilasD == 0){
            return view ('/cargamasiva',compact(throw ValidationException::withMessages(['El archivo excel está vacio.'])));
        }
        //verifica que los nombres de las cabeceras esten escrito de forma correcta
        if(strtoupper($valorCeldaA) !='CARRERA' or strtoupper($valorCeldaB) != 'RUT' or strtoupper($valorCeldaC) !='NOMBRE' or strtoupper($valorCeldaD) != 'CORREO'){
            return view ('/cargamasiva',compact(throw ValidationException::withMessages(['El archivo tiene columnas con nombres que no corresponden a "Carrera,Rut,Nombre,Correo."'])));
        }
        // revisa si existen las columnas, pero no tienen datos
        if($contadorFilasA == 1 and $contadorFilasB == 1 and $contadorFilasC == 1 and $contadorFilasD == 1){
            return view ('/cargamasiva',compact(throw ValidationException::withMessages(['El archivo excel no tiene datos en sus columnas.'])));
        }
        //si el archivo contiene columnas vacias
        if($contadorFilasA == 1 or $contadorFilasB == 1 or $contadorFilasC == 1 or $contadorFilasD == 1){
            return view ('/cargamasiva',compact(throw ValidationException::withMessages(['El archivo excel tiene columnas vacias.'])));
        }
        //si existen valores diferentes en otras columnas que no sean A,B,C,D genera un error
        if($columna != 'A' and $columna != 'B' and $columna != 'C' and $columna !='D'){
            return view ('/cargamasiva',compact(throw ValidationException::withMessages(['El archivo excel tiene elementos en celdas no seleccionadas.'])));
        }
    }
    //modelo que crea los nuevos usuarios y estudiantes
    public function model(array $row)
    {
        $codigoCarrera = Carrera::where('codigo',$row['carrera'])->get()->first();
        $usuarioCreado = User::create([

            'name'=>$row['nombre'],
            'rut'=>$row['rut'],
            'status'=> '1',
            'email'=>$row['correo'],
            'password'=>Hash::make(substr($row['rut'],0,6)),
            'rol'=>'0'
        ]);
        user_Excel::create([

            'agregado'=>'SI',
            'rut'=>$row['rut'],
            'nombre'=> $row['nombre'],
            'correo'=>$row['correo'],
            'carrera'=>$row['carrera'],
        ]);

        return new Estudiante([
            'carrera_id' => $codigoCarrera->id,
            'usuario_id' => $usuarioCreado->id,

        ]);
    }
    //reglas que deben cumplirse para que un estudiante pueda ser ingresado.
    public function rules(): array{
        return[
            'carrera'=> ['required',new existeCarrera()],
            'rut'=> ['required','unique:users,rut',new ValidarRut()],
            'nombre'=> ['required','string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
            'correo'=>['required','string', 'max:255', 'unique:users,email',new validarEmail()],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'carrera.required' => 'El código de carrera es obligatorio.',
            'rut.required' => 'El rut de la persona es obligatorio.',
            'rut.unique' => 'El rut ya está en uso.',
            'nombre.required' => 'El nombre de la persona es obligatorio.',
            'correo.required' => 'El email es obligatorio.',
            'correo.unique' => 'El email ya está en uso.',
        ];
    }

    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
    }

    // public function onFailure(Failure ...$failures)
    // {
    //     // Handle the failures how you'd like.
    // }
}
