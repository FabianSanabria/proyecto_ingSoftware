<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\User;
use App\Rules\validarEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class editarUsuarioController extends Controller
{
    //
    public function index()

    {
        $usuarios = DB::table('users')->get();
        //dd($totalCarreras);
        return view('usuario.listaUsuarios',compact('usuarios'));
    }
    public function editar(Request $request)

    {
        $carreras = DB::table('carreras')->get();
        $usuario = User::where('id',$request->id)->get()->first();
        return view('usuario.modificarUsuario')->with("usuario",$usuario)->with('carreras',$carreras);
    }
    public function update(Request $request)
    {
        $usuarioaModificar = $usuario = User::findOrFail($request->id);
        if($usuarioaModificar->rol == $request->rol)
        {
            $request->validate([

                'nombre' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                'email' => ['required', 'string',new validarEmail(), 'max:255', Rule::unique('users')->ignore($request->id)],

            ]);
            $usuarioaModificar->name = $request->nombre;
            $usuarioaModificar->email = $request->email;
            $usuario->saveOrFail();
            return redirect('usuario');

        }else
        {
            if($request->rol == 0)
            {
                $request->validate(
                    [
                    'nombre' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                    'email' => ['required', 'string',new validarEmail(), 'max:255', Rule::unique('users')->ignore($request->id)],
                    'carrera' =>['unique:jefede_carreras,carrera_id'],
                    ],
                    [
                    'carrera.unique' => 'La carrera ya posee un jefe de carrera'
                    ]
                 );
                $usuarioaModificar->name = $request->nombre;
                $usuarioaModificar->email = $request->email;
                $estudianteaModificar = Estudiante::where('usuario_id', $usuarioaModificar->id)->first();


            }
            if($request->rol == 1)
            {

            }

        }

        $request->validate(
            [
            'nombre' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
            'email' => ['required', 'string',new validarEmail(), 'max:255', Rule::unique('users')->ignore($request->id)],
            'carrera' =>['unique:jefede_carreras,carrera_id'],
            ],
            [
            'carrera.unique' => 'La carrera ya posee un jefe de carrera'
            ]
            );

        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->rol = $request->rol;





        $usuario->saveOrFail();
        return redirect('usuario');
    }

}
