<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Carrera;
use App\Rules\ValidarRut;
use App\Models\Estudiante;
use App\Rules\validarEmail;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Models\JefedeCarrera;
use App\Rules\existeJefedeCarrera;
use Illuminate\Support\Facades\DB;
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
            'rol' =>['required'],
         ]);

        if(strcmp($_POST['rol'],"Estudiante") == 0)
        {
         $request->validate([
                'name' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                'rut' => ['required', 'string','unique:users', new ValidarRut()],
                'email' => ['required', 'string',new validarEmail(), 'max:255', 'unique:users'],
                'rol' =>['regex:(Estudiante|Jefe de Carrera|Administrador)'],
                'carrera' =>['required'],
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

        return redirect('/usuario')->with('message',"Usuario creado con éxito");

        }

        if(strcmp($_POST['rol'],"Jefe de Carrera") == 0)
        {
            $request->validate(

                [
                 'name' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
                 'rut' => ['required', 'string','unique:users', new ValidarRut()],
                 'email' => ['required', 'string',new validarEmail(), 'max:255', 'unique:users'],
                 'rol' =>['regex:(Estudiante|Jefe de Carrera|Administrador)'],
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
            return redirect('/usuario')->with('message',"Usuario creado con éxito");


        }

    }

    public function importForm(){
        $userImport = DB::table('user_excels')->get();
        return view('usuario.cargamasiva')->with('userImport',$userImport);;
    }

    public function importExcel(Request $request){


        $file = $request->file('file');
        $import = new UsersImport();
        $import->import($file);

        $totalUsers = DB::table('user_excels')->count();
        //dd($totalUsers);
        //dd($import->failures());
        //dd($userImport);
        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures())->with('message','Se han agregado satisfactoriamente : '.$totalUsers.' '."usuarios");
        }
        return back()->with('message','Se han agregado satisfactoriamente : '.$totalUsers.' '."usuarios");


    }

}
