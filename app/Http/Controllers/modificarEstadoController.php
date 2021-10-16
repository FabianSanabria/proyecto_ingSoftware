<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class modificarEstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search == null)
        {
            $usuarios = User::simplePaginate(5);
            return view('usuario.modificarEstado')->with('usuarios',$usuarios);
        }else
        {
            $usuarios = User::where('rut',$request->search)->simplePaginate(1);
            return view('usuario.modificarEstado')->with('usuarios',$usuarios);
        }
    }
}
