<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ReestablecerContraseñaController extends Controller
{
    public function _constuct()
    {
        $this->middleware('auth');
    }

    public function reestablecerContraseña(Request $request)
    {
        $usuario = User::where('id',$request->id)->get()->first();

        $rut = $usuario->rut;
        $newPassword = substr($rut,0,6);

        $usuario->password = Hash::make($newPassword);
        $usuario->save();
        return redirect('/modificarEstado')->with('message','Contraseña restablecida!');
    }
}
