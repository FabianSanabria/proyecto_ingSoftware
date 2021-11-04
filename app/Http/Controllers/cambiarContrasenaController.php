<?php

namespace App\Http\Controllers;

use App\Rules\validarPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class cambiarContrasenaController extends Controller

{

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

    public function index()

    {
        return view('cambiarContrasena');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)

    {

        $request->validate([

            'password' => ['required', new validarPassword],

            'new_password' => ['required','string','min:6'],

            'password_confirmation' => ['same:new_password'],

        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

       // alert()->success('Contraseña actualizada con éxito')->persistent('Cerrar');
        //SweetAlert::success('Contraseña actualizada con éxito')->persistent('Cerrar'); no funciono :(

        return redirect()->route('home')->with('message','Contraseña actualizada!');


    }

}
