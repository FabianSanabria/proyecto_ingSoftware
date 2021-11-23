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
        $jefesdecarreras = DB::table('jefede_carreras')->get();
        if ($request->search == null) {
            $solicitud = Solicitud::simplePaginate(100); //Puede que haya que corregír esto más pronto que tarde
            $user = User::simplePaginate(100); //Esto también
            return view('resolverSolicitud',compact('solicitud','user','jefesdecarreras'));
        }else {
            $solicitud = Solicitud::where('codigo', $request->search)->simplePaginate(1);
            $user = User::where('codigo', $request->search)->simplePaginate(1);
            return view('resolverSolicitud')->with('solicitudes',$solicitud,'users',$user)->with('jefesdecarreras',$jefesdecarreras);
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

    public function update(Request $request)
    { // función que maneja los distintos casos posibles al editar un usuario
        //Por parametro debe estar recibiendo la solicitud en la que estamos operando
        //$usuarioaModificar = $usuario = User::findOrFail($request->id);

        $solicitudaModificar = $solicitudes = Solicitud::findOrFail($request->id);
        $solicitudaModificar->respuestaSolicitud = $request->observaciones;

        if($request->tipoRespuesta == "Aceptada")
        {   $solicitudaModificar->estado = 1;   }
        else if($request->tipoRespuesta == "Aceptada con observaciones")
        {   $solicitudaModificar->estado = 2;   }
        else
        {   $solicitudaModificar->estado = 3;   }

        $solicitudaModificar->saveOrFail();

        return redirect('resolverSolicitud')->with('message', 'La solicitud ha sido contestada.');


        //$solicitudaModificar->email = $request->email;


        /*
        if($usuarioaModificar->rol == $request->rol)// si entra al if significa que el rol no se cambiará
        {

           if($usuarioaModificar->rol == 0){ // si el rol es 0 es un estudiante

            $estudianteaModificar = Estudiante::where('usuario_id', $usuarioaModificar->id)->first();// buscamos al estudiante
            if ($estudianteaModificar->carrera_id == $request->carrera) { // no se modifica la carrera
                $request->validate(
                    [
                    'nombre' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                    'email' => ['required', 'string',new validarEmail(), 'max:255', Rule::unique('users')->ignore($request->id)],
                    ],
                );
                $usuarioaModificar->name = $request->nombre;
                $usuarioaModificar->email = $request->email;
                $usuarioaModificar->saveOrFail();

                return redirect('usuario')->with('message', 'Cambios realizados con éxito');
            } else { // se modifica la carrera de un estudiante, se anularan sus solicitudes pendientes
                $request->validate(
                    [
                    'nombre' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                    'email' => ['required', 'string',new validarEmail(), 'max:255', Rule::unique('users')->ignore($request->id)],
                    ],
                );
                $usuarioaModificar->name = $request->nombre;
                $usuarioaModificar->email = $request->email;
                $estudianteaModificar->carrera_id = $request->carrera;
                $estudianteaModificar->saveOrFail();
                $usuarioaModificar->saveOrFail();
                $solicitudesEstudiante = Solicitud::where('estudiante_id',$estudianteaModificar->id)->get();
                foreach($solicitudesEstudiante as $solicitud)
                {
                    if($solicitud->estado == 0){
                        $solicitud->estado = 4;
                        $solicitud->respuestaSolicitud = 'Cambio de carrera';
                        $solicitud->saveOrFail();
                    }
                }

                return redirect('usuario')->with('message', 'Cambios realizados con éxito');

            }
           }
           if($usuarioaModificar->rol == 1){ // si el rol es 1 es jefe de carrera

            $jefedecarreraModificar = JefedeCarrera::where('usuario_id',$usuarioaModificar->id)->first();
            $carrera = Carrera::where('jefe_carrera_id',$jefedecarreraModificar->id)->first();
            if($carrera->id == $request->carrera){ // no se modifica carrera

                $request->validate(
                    [
                    'nombre' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                    'email' => ['required', 'string',new validarEmail(), 'max:255', Rule::unique('users')->ignore($request->id)],
                    ],
                );
                $usuarioaModificar->name = $request->nombre;
                $usuarioaModificar->email = $request->email;
                $usuarioaModificar->saveOrFail();

                return redirect('usuario')->with('message', 'Cambios realizados con éxito');

            }else // se modifica la carrera, validar si existe ya un jefe de carrera
            {

                $request->validate(
                    [
                    'nombre' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                    'email' => ['required', 'string',new validarEmail(), 'max:255', Rule::unique('users')->ignore($request->id)],
                    'carrera' =>['required',new existeJefedeCarrera()],
                    ]
                );
                $carrera_nueva = Carrera::where('id',$request->carrera)->first();
                $usuarioaModificar->name = $request->nombre;
                $usuarioaModificar->email = $request->email;
                $carrera->jefe_carrera_id = NULL;
                $carrera_nueva->jefe_carrera_id = $jefedecarreraModificar->id;
                $usuarioaModificar->saveOrFail();
                $carrera->saveorFail();
                $carrera_nueva->saveorFail();

                return redirect('usuario')->with('message', 'Cambios realizados con éxito');
            }


           }
           return view('usuario');//no entro a ninguna de las 2 opciones ERROR

        }else//si entra aca el rol será cambiado
        {
            if($usuarioaModificar->rol == 1) //rol sera cambiado de jefe de carrera a estudiante
            {
                $jefedecarreraModificar = JefedeCarrera::where('usuario_id',$usuarioaModificar->id)->first();
                $carrera = Carrera::where('jefe_carrera_id',$jefedecarreraModificar->id)->first();

                if($carrera->id == $request->carrera){ // no se modifica la carrera
                    $request->validate(
                        [
                        'nombre' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                        'email' => ['required', 'string',new validarEmail(), 'max:255', Rule::unique('users')->ignore($request->id)],
                        ],
                    );
                    $usuarioaModificar->name = $request->nombre;
                    $usuarioaModificar->email = $request->email;
                    $usuarioaModificar->rol = 0;
                    $jefedecarreraModificar->delete();
                    Estudiante::create([// borramos la instancia jefe de carrera y creamos la de estudiante
                        'carrera_id' => $carrera->id,
                        'usuario_id' => $usuarioaModificar->id,
                    ]);
                    $usuarioaModificar->saveOrFail();
                    $carrera->saveorFail();

                    return redirect('usuario')->with('message', 'Cambios realizados con éxito');
                }else{ // se modifica la carrera
                    $request->validate(
                        [
                        'nombre' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                        'email' => ['required', 'string',new validarEmail(), 'max:255', Rule::unique('users')->ignore($request->id)],
                        ],
                    );
                    $usuarioaModificar->name = $request->nombre;
                    $usuarioaModificar->email = $request->email;
                    $usuarioaModificar->rol = 0;
                    $jefedecarreraModificar->delete();
                    Estudiante::create([// borramos la instancia jefe de carrera y creamos la de estudiante
                        'carrera_id' => $request->carrera,
                        'usuario_id' => $usuarioaModificar->id,
                    ]);
                    $usuarioaModificar->saveOrFail();
                    $carrera->saveorFail();

                    return redirect('usuario')->with('message', 'Cambios realizados con éxito');
                }
            }
            if($usuarioaModificar->rol == 0) // rol sera cambiado de estudiante a jefe de carrera
            {
                $request->validate(
                    [
                    'nombre' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                    'email' => ['required', 'string',new validarEmail(), 'max:255', Rule::unique('users')->ignore($request->id)],
                    'carrera' =>['required',new existeJefedeCarrera()],
                    ]
                );
                $estudianteaModificar = Estudiante::where('usuario_id', $usuarioaModificar->id)->first();// buscamos al estudiante
                $carrera = Carrera::where('id',$estudianteaModificar->carrera_id)->first();
                if($carrera->id == $request->carrera){// Se mantiene la carrera
                    $solicitudesEstudiante = Solicitud::where('estudiante_id',$estudianteaModificar->id)->get(); // anulamos solicitudes pendientes
                    foreach($solicitudesEstudiante as $solicitud)
                    {
                        if($solicitud->estado == 0){
                            $solicitud->estado = 4;
                            $solicitud->respuestaSolicitud = 'Cambio de rol usuario';
                            $solicitud->saveOrFail();
                        }
                    }
                    $estudianteaModificar->delete();
                    $jefedecarrera = JefedeCarrera::create([
                        'usuario_id' => $usuarioaModificar->id,
                    ]);
                    $carrera->jefe_carrera_id = $jefedecarrera->id;
                    $usuarioaModificar->name = $request->nombre;
                    $usuarioaModificar->email = $request->email;
                    $usuarioaModificar->rol = 1;
                    $usuarioaModificar->saveOrFail();
                    $carrera->saveorFail();

                    return redirect('usuario')->with('message', 'Cambios realizados con éxito');
                }else{ // cambiamos la carrera
                    $solicitudesEstudiante = Solicitud::where('estudiante_id',$estudianteaModificar->id)->get(); // anulamos solicitudes pendientes
                    foreach($solicitudesEstudiante as $solicitud)
                    {
                        if($solicitud->estado == 0){
                            $solicitud->estado = 4;
                            $solicitud->respuestaSolicitud = 'Cambio de rol usuario';
                            $solicitud->saveOrFail();
                        }
                    }
                    $estudianteaModificar->delete();
                    $jefedecarrera = JefedeCarrera::create([
                        'usuario_id' => $usuarioaModificar->id,
                    ]);
                    $carreraEditar = Carrera::where('id',$request->carrera)->first();
                    $carreraEditar->jefe_carrera_id = $jefedecarrera->id;
                    $usuarioaModificar->name = $request->nombre;
                    $usuarioaModificar->email = $request->email;
                    $usuarioaModificar->rol = 1;
                    $usuarioaModificar->saveOrFail();
                    $carreraEditar->saveorFail();

                    return redirect('usuario')->with('message', 'Cambios realizados con éxito');
                }

            }

        }
        */

    }
}
