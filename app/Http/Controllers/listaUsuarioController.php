<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class listaUsuarioController extends Controller
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

        $request->validate([

            'nombre' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

        ]);

        $usuario = $usuario = User::findOrFail($request->id);

        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->rol = $request->rol;
        $usuario->carrera_id = $request->carrera;
        $usuario->saveOrFail();
        return redirect('usuario');
    }

}
