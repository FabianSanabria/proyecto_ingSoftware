<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DeshabilitarUsuarioController extends Controller
{
    public function _constuct()
    {
        $this->middleware('auth');
    }

    public function deshabilitarUsuario(Request $request)
    {
        $usuario = User::where('id',$request->id)->get()->first();

        if($usuario->status == true)
        {
            $usuario->status = false;
            $usuario->save();
            return redirect('/modificarEstado');
        }else
        {
            $usuario->status = true;
            $usuario->save();
            return redirect('/modificarEstado');
        }
    }
}
