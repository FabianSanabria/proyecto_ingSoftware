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

    public function index()

    {
        $carreras = DB::table('carreras')->get();
        $totalCarreras = DB::table('carreras')->count();
        //dd($totalCarreras);
        return view('usuario.crearUsuario',compact('carreras','totalCarreras'));
    }
    public function crearUsuario(Request $request)
    {


        if(strcmp($_POST['rol'],"Estudiante") == 0)
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

        $password = substr($rut,0,6);
        $usuarioCreado = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'rut' => $request->rut,
            'status' => true,
            'password' => Hash::make($password),
            'rol' => $rolNum,

        ]);
        Estudiante::create([

            'carrera_id' => $carreraid,
            'usuario_id' => $usuarioCreado->id,

        ]);

        return redirect('/usuario')->with('message');

        }

        if(strcmp($_POST['rol'],"Jefe de Carrera") == 0)
        {
            $request->validate(

                [
                 'name' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                 'rut' => ['required', 'string','unique:users', new ValidarRut()],
                 'email' => ['required', 'string',new validarEmail(), 'max:255', 'unique:users'],
                 'rol' =>['required','regex:(Estudiante|Jefe de Carrera|Administrador)'],
                 'carrera' =>['required',new existeJefedeCarrera()],
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
            $carrera->jefe_carrera_id = $jefedecarrera->id;
            $carrera->save();
            return redirect('/usuario')->with('message');


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
        Excel :: import(new UsersImport,$file);

        return redirect('/cargamasiva')->with('message');

    }
}
