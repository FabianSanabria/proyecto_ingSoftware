<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Solicitud;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Rules\buscarEstudiante;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class buscarEstudianteController extends Controller
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
        $jefesdecarreras = DB::table('jefede_carreras')->get();
        $listaEstudiantes = DB::table('estudiantes')->get();
        $listaCarreras = DB::table('carreras')->get();
        $solicitud = DB::table('solicituds')->get();
        $user = DB::table('users')->get();
        $comprobarEstado= User::where('rut','=', $request->search)->value("rol");
        $comprobarUsuario = User::where('rut','=', $request->search)->value('rut');
        $rut = null;
        $nombre=null;
        $email = null;
        $carrera = null;
        $error = 0;
        $comprobarCampo = $request->query('search');

        //dd($request->query('search'),$comprobarUsuario);

        if($comprobarEstado == 2 or $comprobarEstado == 1 ){
            return view('/buscarEstudiante',compact('solicitud','user','jefesdecarreras','listaEstudiantes','listaCarreras'))
            ->with('rut',$rut)->with('nombre',$nombre)->with('carrera',$carrera)->with("email",$email)->with('error',$error);
        }
        if($comprobarCampo = $request->query('search')!= null and $comprobarUsuario == null){
            $error = 1;
            return view('/buscarEstudiante',compact('solicitud','user','jefesdecarreras','listaEstudiantes','listaCarreras'))
            ->with('rut',$rut)->with('nombre',$nombre)->with('carrera',$carrera)->with("email",$email)->with('error',$error);
        }

        if($request->search == null){
            return view('/buscarEstudiante',compact('solicitud','user','jefesdecarreras','listaEstudiantes','listaCarreras'))
            ->with('rut',$rut)->with('nombre',$nombre)->with('carrera',$carrera)->with("email",$email)->with('error',$error);
        }
        $userId = User::where('rut', $request->search)->value("id");
        $estudianteId = Db::table('estudiantes')->where("usuario_id",$userId)->value("id");
        $solicitud = Solicitud::where("estudiante_id",$estudianteId)->simplePaginate(100);

        $rut= User::where('rut', $request->search)->value('rut');
        $nombre= User::where('rut', $request->search)->value('name');
        $email = User::where('rut', $request->search)->value('email');

        $carrera_id = Db::table("estudiantes")->where("id",$estudianteId)->value("carrera_id");
        $carrera = Db::table("carreras")->where("id",$carrera_id)->value("Nombre");
        $solicitud = Solicitud::where("estudiante_id",$estudianteId)->simplePaginate(100);
        $user = User::where('rut', $request->search)->simplePaginate(100);
        return view('/buscarEstudiante')->with('solicitud',$solicitud)->with('user',$user)->with('jefesdecarreras',$jefesdecarreras)
        ->with('listaEstudiantes',$listaEstudiantes)->with('listaCarreras',$listaCarreras)
        ->with('rut',$rut)->with('nombre',$nombre)->with('carrera',$carrera)->with("email",$email)->with('error',$error);
    }
    public function verDatos(Request $request)
    {
        $carreras = DB::table('carreras')->get();
        $solicitudes = Solicitud::where('id',$request->id)->get()->first();
        $listaUsuarios = DB::table('users')->get();
        $listaEstudiantes = DB::table('estudiantes')->get();
        $carrera_usuario = NULL;
        $ayudantias = DB::table('ayudantias')->get();
        $facilidades = DB::table('facilidades')->get();
        $archivos = DB::table('archivos')->get();

        return view('/revisarDatos')->with('carreras',$carreras)->with('carrera_usuario',$carrera_usuario)->with('solicitudes',$solicitudes)->with('listaUsuarios',$listaUsuarios)->with('ayudantias',$ayudantias)->with('facilidades',$facilidades)->with('archivos',$archivos)->with('listaEstudiantes',$listaEstudiantes);
    }

}
