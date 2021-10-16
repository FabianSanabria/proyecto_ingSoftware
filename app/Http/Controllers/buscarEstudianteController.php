<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function index()

    {
        //dd($totalCarreras);
        return view('buscarEstudiante');
    }
    public function crearUsuario(Request $request)
    {


        return redirect('/usuario')->with('success','Usuario creado con exito');
    }





}
