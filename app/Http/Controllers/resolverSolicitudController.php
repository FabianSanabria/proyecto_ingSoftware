<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Estudiante;
use App\Models\JefedeCarrera;
use App\Models\Carrera;
use App\Rules\validarEmail;
use Illuminate\Validation\Rule;
use App\Rules\existeJefedeCarrera;

class resolverSolicitudController extends Controller
{
    //
        //
     /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()

    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)

    {
        //dd($totalCarreras);
        //return view('resolverSolicitud');

        if ($request->search == null) {
            $solicitud = Solicitud::simplePaginate(100); //Puede que haya que corregír esto más pronto que tarde
            $user = User::simplePaginate(100); //Esto también
            return view('resolverSolicitud',compact('solicitud','user'));
        }else {
            $solicitud = Solicitud::where('codigo', $request->search)->simplePaginate(1);
            $user = User::where('codigo', $request->search)->simplePaginate(1);
            return view('resolverSolicitud')->with('solicitudes',$solicitud,'users',$user);
        }
    }

    public function resolverSolicitud(Request $request)
    //Funcion que permite resolver la solicitud
    {//Desplegando los datos de la solicitud y la opción para aceptar o rechazar.
        $carreras = DB::table('carreras')->get();
        $solicitudes = Solicitud::where('id',$request->id)->get()->first();
        $usuario = User::where('id',$request->id)->get()->first();
        $listaUsuarios = DB::table('users')->get();
        $carrera_usuario = NULL;
        $solicitud_id = NULL;
        if($usuario->rol == 0)
        {
            $estudiante = Estudiante::where('usuario_id',$usuario->id)->get()->first(); //Retornamos el usuario seleccionado
            $carrera_usuario = $estudiante->carrera_id; //La carrera del usuario seleccionado
            $estudiante_id = $estudiante->id; //El id del estudiante seleccionado

        }else{//IMPORTANTE, luego debería dejar solo el rol 0, estudiante, porque los jefes de carrera no deberían poder hacer solicitudes
            $jefedecarrera = JefedeCarrera::where('usuario_id',$usuario->id)->get()->first();
            $carrera = Carrera::where('jefe_carrera_id',$jefedecarrera->id)->get()->first();
            $carrera_usuario = $carrera->id;
        }
        return view('responderSolicitud')->with("usuario",$usuario)->with('carreras',$carreras)->with('carrera_usuario',$carrera_usuario)->with('solicitudes',$solicitudes)->with('listaUsuarios',$listaUsuarios);
    }
}
