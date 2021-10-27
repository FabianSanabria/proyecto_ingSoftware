<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use Ramsey\Uuid\Type\Integer;

class solicitudAlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('solicitudAlumno.index');
    }

    /**
     * Identifica que solicitud se quiere crear.
     *
     * @return \Illuminate\Http\Response
     */
    public function Solicitud(Request $request)
    {
        $solicitud = $request->tipoSolicitud;
        if(strcmp("Sobrecupo",$solicitud) == 0){
            return view('solicitudAlumno.generarSolicitud')->with("solicitud",0);
        }
        if(strcmp("Cambio paralelo",$solicitud) == 0){
            return view('solicitudAlumno.generarSolicitud')->with("solicitud",1);
        }
        if(strcmp("Eliminación asignatura",$solicitud) == 0){
            return view('solicitudAlumno.generarSolicitud')->with("solicitud",2);

        }
        if(strcmp("Inscripción asignatura",$solicitud) == 0){
            return view('solicitudAlumno.generarSolicitud')->with("solicitud",3);

        }
        if(strcmp("Ayudantía",$solicitud) == 0){
            return view('solicitudAlumno.generarSolicitud')->with("solicitud",4);

        }
        if(strcmp("Facilidades",$solicitud) == 0){
            return view('solicitudAlumno.generarSolicitud')->with("solicitud",5);

        }

    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        if($request->solicitud == 0){
            //crear solicitud xd x6
        }

        return view('solicitudAlumno.generarSolicitud');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => ['required', 'string','unique:carreras','min:4','max:4','regex:/^[1-9][0-9]*$/'],
            'nombre' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
        ]);

        Carrera::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre
        ]);

        return redirect('/carrera')->with('success','Carrera creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('solicitudAlumno.editarSolicitud');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {

        $request->validate(['codigo' => 'regex:/^[0-9]+$/']);
        $request->validate(['nombre' => 'regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/']);
        $carrera->nombre = $request->nombre;
        $carrera->codigo = $request->codigo;
        $carrera->save();
        return redirect('/carrera');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        //
    }
}

