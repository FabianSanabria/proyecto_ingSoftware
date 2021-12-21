<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Estudiante;
use App\Models\JefedeCarrera;
use App\Models\Carrera;
use App\Models\Facilidades;
use App\Models\Ayudantia;
use App\Models\Archivo;
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

    /**
     * Según el request que corresponde a la solicitud seleccionada, se despliegan sus datos
     * Además se añade una lista de estudiantes asociada a la tabla estudiantes y
     * la lista de usuarios.
     * @param Request $request - Corresponde a la solicitud seleccionada.
     * @return void
    */
    public function index(Request $request)
    {
        $jefesdecarreras = DB::table('jefede_carreras')->get();
        $listaEstudiantes = DB::table('estudiantes')->get();
        $listaCarreras = DB::table('carreras')->get();
        $solicitud = DB::table('solicituds')->get();
        $user = DB::table('users')->get();

        if ($request->search == null) {
            //$solicitud = Solicitud::simplePaginate(300); //Esto influye en la cantidad de datos que se puede acceder desde las otras vistas
            //$user = User::simplePaginate(300); //Esto influye en la cantidad de datos que se puede acceder desde las otras vistas
            return view('resolverSolicitud',compact('solicitud','user','jefesdecarreras','listaEstudiantes','listaCarreras'));
        }else {
            $solicitud = Solicitud::where('codigo', $request->search)->simplePaginate(1);
            $user = User::where('codigo', $request->search)->simplePaginate(1);
            return view('resolverSolicitud')->with('solicitud',$solicitud,'users',$user)->with('jefesdecarreras',$jefesdecarreras)->with('listaEstudiantes',$listaEstudiantes)->with('carreras',$listaCarreras);
        }
    }


    /**
     * Función que permite resolver la solicitud
     * Desplegando los datos de la solicitud y la opción para aceptarla o rechazarla.
     * @param Request $request - Corresponde a la solicitud seleccionada.
     * @return void
     */
    public function resolverSolicitud(Request $request)
    {
        $carreras = DB::table('carreras')->get();
        $solicitudes = Solicitud::where('id',$request->id)->get()->first();
        $listaUsuarios = DB::table('users')->get();
        $listaEstudiantes = DB::table('estudiantes')->get();
        $carrera_usuario = NULL;
        $solicitud_id = NULL;

        $ayudantias = DB::table('ayudantias')->get();
        $facilidades = DB::table('facilidades')->get();
        $archivos = DB::table('archivos')->get();

        return view('responderSolicitud')->with('carreras',$carreras)->with('carrera_usuario',$carrera_usuario)->with('solicitudes',$solicitudes)->with('listaUsuarios',$listaUsuarios)->with('ayudantias',$ayudantias)->with('facilidades',$facilidades)->with('archivos',$archivos)->with('listaEstudiantes',$listaEstudiantes);
    }

    /**
     * Función que maneja los distintos casos al editar un usuario.
     * Y actualiza la base de datos con los datos respondidos.
     * A su vez cambia el estado de la solicitud a aceptado o rechazado.
     * @param Request $request - Corresponde a los datos de la solicitud.
     * @return void
     */
    public function update(Request $request)
    {
        $solicitudaModificar = $solicitudes = Solicitud::findOrFail($request->id);
        $solicitudaModificar->respuestaSolicitud = $request->observaciones;

        if($request->tipoRespuesta == "Aceptada")
        {   $solicitudaModificar->estado = 1;   }
        else if($request->tipoRespuesta == "AceptadaCon")
        {   $solicitudaModificar->estado = 2;   }
        else
        {   $solicitudaModificar->estado = 3;   }

        $solicitudaModificar->saveOrFail();

        return redirect('/resolverSolicitud')->with('message','Se ha enviado la respuesta correctamente');
    }
}
