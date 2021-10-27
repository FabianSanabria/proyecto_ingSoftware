<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Rules\validarEmail;
use App\Rules\ValidarRut;
use Illuminate\Support\Facades\Hash;
class crearUsuarioController extends Controller
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
        $carreras = DB::table('carreras')->get();
        $totalCarreras = DB::table('carreras')->count();
        //dd($totalCarreras);
        return view('usuario.crearUsuario',compact('carreras','totalCarreras'));
    }
    public function crearUsuario(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
            'rut' => ['required', 'string','unique:users', new ValidarRut()],
            'email' => ['required', 'string',new validarEmail(), 'max:255', 'unique:users'],
            'rol' =>['required','regex:(Estudiante|Jefe de Carrera|Administrador)'],

        ]);

        if(strcmp($_POST['rol'],"Estudiante") == 0)
        {
            $rolNum = 0;

        }

        if(strcmp($_POST['rol'],"Jefe de Carrera") == 0)
        {
            $rolNum = 1;

        }
        if(strcmp($_POST['rol'],"Administrador") == 0)
        {
            $rolNum = 2;

        }
        $carrera = $request->carrera;
        $rut = $request->rut;

        $password = substr($rut,0,6);
        User::create([

            'carrera_id' => $carrera,
            'name' => $request->name,
            'email' => $request->email,
            'rut' => $request->rut,
            'status' => true,
            'password' => Hash::make($password),
            'rol' => $rolNum,

        ]);

        return redirect('/usuario')->with('success','Usuario creado con exito');
    }





}
