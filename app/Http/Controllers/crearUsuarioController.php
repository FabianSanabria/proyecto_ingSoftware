<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
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

    public function index(Request $request)

    {
        if ($request->search == null) {
            $user = User::simplePaginate(5);
            return view('/listausuario')->with('usuarios',$user);
        }else {
            $user = User::where('rut', $request->search)->simplePaginate(1);
            return view('/listausuario')->with('usuarios',$user);
        }

        $carreras = DB::table('carreras')->get();
        $totalCarreras = DB::table('carreras')->count();
        //dd($totalCarreras);
        return view('usuario.crearUsuario',compact('carreras','totalCarreras'));
    }
    public function crearUsuario(Request $request)
    {

        $request->validate([
            'rut' => ['required', 'string','unique:users','regex:/^[1-9][0-9]*$/'],
            'name' => ['required', 'string', 'max:255','regex:/^[A-z]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
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
        $rut = $request->rut;
        $password = substr($rut,0,6);
        User::create([

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
