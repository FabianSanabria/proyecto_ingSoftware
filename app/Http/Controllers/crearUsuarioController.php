<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\JefedeCarrera;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Rules\existeJefedeCarrera;
use App\Rules\validarEmail;
use App\Rules\ValidarRut;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

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

    public function index() // funcion que retorna la vista crear usuario, con las carreras que se encuentran en la BD

    {
        $carreras = DB::table('carreras')->get();
        $totalCarreras = DB::table('carreras')->count();
        //dd($totalCarreras);
        return view('usuario.crearUsuario',compact('carreras','totalCarreras'));
    }
    public function crearUsuario(Request $request)
    {


        if(strcmp($_POST['rol'],"Estudiante") == 0) //si el rol elegido en el formulario es estudiante se crea un estudiante
        {
         $request->validate([
                'name' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                'rut' => ['required', 'string','unique:users', new ValidarRut()],
                'email' => ['required', 'string',new validarEmail(), 'max:255', 'unique:users'],
                'rol' =>['required','regex:(Estudiante|Jefe de Carrera|Administrador)'],
         ]);
        $rolNum = 0;
        $carreraid = $request->carrera;
        $rut = $request->rut;

        $password = substr($rut,0,6); // la contraseña son los primeros 6 digitos del rut
        $usuarioCreado = User::create([ // creamos al estudiante

            'name' => $request->name,
            'email' => $request->email,
            'rut' => $request->rut,
            'status' => true,
            'password' => Hash::make($password),
            'rol' => $rolNum,

        ]);
        Estudiante::create([ // creamos al estudiante y le pasamos la id del usuario

            'carrera_id' => $carreraid,
            'usuario_id' => $usuarioCreado->id,

        ]);

        return redirect('/usuario')->with('message','Usuario creado con éxito');

        }

        if(strcmp($_POST['rol'],"Jefe de Carrera") == 0) // creamos un jefe de carrera
        {
            $request->validate( // validamos los campos enviados por el formulario

                [
                 'name' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                 'rut' => ['required', 'string','unique:users', new ValidarRut()],
                 'email' => ['required', 'string',new validarEmail(), 'max:255', 'unique:users'],
                 'rol' =>['required','regex:(Estudiante|Jefe de Carrera|Administrador)'],
                 'carrera' =>['required',new existeJefedeCarrera()], // revisamos si existe ya un jefe de carrera
                ]
                );

            $rolNum = 1;
            $carrera_id = $request->carrera;
            $carrera = Carrera::where('id',$carrera_id)->first();
            $rut = $request->rut;
            $password = substr($rut,0,6);
            $usuarioCreado = User::create([

                'name' => $request->name,
                'email' => $request->email,
                'rut' => $request->rut,
                'status' => true,
                'password' => Hash::make($password),
                'rol' => $rolNum,

            ]);
            $jefedecarrera = JefedeCarrera::create([
                'usuario_id' => $usuarioCreado->id,
            ]);
            $carrera->jefe_carrera_id = $jefedecarrera->id; // Pasamos la id del jefe de carrera a la carrera correspondiente
            $carrera->save();
            return redirect('/usuario')->with('message','Usuario creado con éxito');


        }
        if(strcmp($_POST['rol'],"Administrador") == 0)
        {
            $rolNum = 2;

        }
    }

    public function importForm(){
        return view('usuario.cargamasiva');
    }

    public function importExcel(Request $request){
        $file = $request->file('file');
        Excel::import(new UsersImport,$file);
        return redirect('/cargamasiva')->with('message');

    }
}
