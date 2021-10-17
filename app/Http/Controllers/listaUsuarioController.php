<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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

        $usuario = User::where('id',$request->id)->get();
        //dd($totalCarreras);
        return view('usuario.modificarUsuario',compact('usuario'));
    }
}
