<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Estudiante;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        // $carreras = DB::table('carreras')->get();
        // $totalCarreras = DB::table('carreras')->count();
        // $existeCarrera = DB::table('carreras').exists($row[0]);
        // $existeCarrera = DB::table('carreras')->where('codigo',$row[0] >0);
        // if(!$existeCarrera){
        //     $codigoCarrera = $row[0];
        // }
        // $codigoCarrera = DB::table('carreras')->where('id',$row[0])->first()->id;
        $codigoCarrera = Carrera::where('id',$row[0])->get()->first();
        // $cantidadDatos = array->count();

        $usuarioCreado = User::create([

            'name'=>$row[2],
            'rut'=>$row[1],
            'status'=> '1',
            'email'=>$row[3],
            'password'=>'1234',
            'rol'=>'0'
        ]);
        return new Estudiante([
            'carrera_id' => $codigoCarrera,
            'usuario_id' => $usuarioCreado->id,

        ]);
    }
    public function validate(){

    }
    public function enviarDatos(){



    }
}