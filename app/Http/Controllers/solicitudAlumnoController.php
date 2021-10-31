<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Ayudantia;
use App\Models\CambioParalelo;
use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\EliminacionAsignatura;
use App\Models\Estudiante;
use App\Models\Facilidades;
use App\Models\InscripcionAsignatura;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Validator;
use App\Models\JefedeCarrera;
use App\Models\Sobrecupo;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;

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

        $solicitud = $request->solicitud;
        if($solicitud == 0){
            return view('solicitudAlumno.generarSolicitud')->with("solicitud",0);
        }
        if($solicitud == 1){
            return view('solicitudAlumno.generarSolicitud')->with("solicitud",1);
        }
        if($solicitud == 2){
            return view('solicitudAlumno.generarSolicitud')->with("solicitud",2);

        }
        if($solicitud == 3){
            return view('solicitudAlumno.generarSolicitud')->with("solicitud",3);

        }
        if($solicitud == 4){
            return view('solicitudAlumno.generarSolicitud')->with("solicitud",4);

        }
        if($solicitud == 5){
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

        if($request->solicitud == 0)
        {

       $validator =  Validator::make($request->all(),[
        'telefono' => ['required', 'string','min:9','max:9'],
        'nrc' => ['required', 'string', 'max:4','min:4'],
        'nombreAsignatura' => ['required', 'string'],
        'detalle' => ['required', 'string'],
        ]);
        if ($validator->fails())
        {

            return  back()->withErrors($validator)->withInput($request->all());
        }
        $estudiante = Estudiante::where('usuario_id',$request->user()->id)->first();
        $carrera = Carrera::where('id',$estudiante->carrera_id)->first();
        $solicitud = Solicitud::create([
            'nombre_asignatura' => $request->nombreAsignatura,
            'detalle' => $request->detalle,
            'numero_de_telefono' => $request->telefono,
            'estado' => 0,
            'estudiante_id' => $estudiante->id,
            'carrera_id'=> $carrera->id,
        ]);
        Sobrecupo::create([
            'nrc' => $request->nrc,
            'solicitud_id' => $solicitud->id,
        ]);
        return redirect('solicitud-alumno');

        }
        if($request->solicitud == 1)
        {

       $validator =  Validator::make($request->all(),[
        'telefono' => ['required', 'string','min:9','max:9'],
        'nrc' => ['required', 'string', 'max:4','min:4'],
        'nombreAsignatura' => ['required', 'string'],
        'detalle' => ['required', 'string'],
        ]);
        if ($validator->fails())
        {

            return  back()->withErrors($validator)->withInput($request->all());
        }
        $estudiante = Estudiante::where('usuario_id',$request->user()->id)->first();
        $carrera = Carrera::where('id',$estudiante->carrera_id)->first();
        $solicitud = Solicitud::create([
            'nombre_asignatura' => $request->nombreAsignatura,
            'detalle' => $request->detalle,
            'numero_de_telefono' => $request->telefono,
            'estado' => 0,
            'estudiante_id' => $estudiante->id,
            'carrera_id'=> $carrera->id,
        ]);
        CambioParalelo::create([
            'nrc' => $request->nrc,
            'solicitud_id' => $solicitud->id,
        ]);
        return redirect('solicitud-alumno');
        }


        if($request->solicitud == 2)
        {

       $validator =  Validator::make($request->all(),[
        'telefono' => ['required', 'string','min:9','max:9'],
        'nrc' => ['required', 'string', 'max:4','min:4'],
        'nombreAsignatura' => ['required', 'string'],
        'detalle' => ['required', 'string'],
        ]);
        if ($validator->fails())
        {

            return  back()->withErrors($validator)->withInput($request->all());
        }
        $estudiante = Estudiante::where('usuario_id',$request->user()->id)->first();
        $carrera = Carrera::where('id',$estudiante->carrera_id)->first();
        $solicitud = Solicitud::create([
            'nombre_asignatura' => $request->nombreAsignatura,
            'detalle' => $request->detalle,
            'numero_de_telefono' => $request->telefono,
            'estado' => 0,
            'estudiante_id' => $estudiante->id,
            'carrera_id'=> $carrera->id,
        ]);
        EliminacionAsignatura::create([
            'nrc' => $request->nrc,
            'solicitud_id' => $solicitud->id,
        ]);
        return redirect('solicitud-alumno');
        }

        if($request->solicitud == 3)
        {

       $validator =  Validator::make($request->all(),[
        'telefono' => ['required', 'string','min:9','max:9'],
        'nrc' => ['required', 'string', 'max:4','min:4'],
        'nombreAsignatura' => ['required', 'string'],
        'detalle' => ['required', 'string'],
        ]);
        if ($validator->fails())
        {

            return  back()->withErrors($validator)->withInput($request->all());
        }
        $estudiante = Estudiante::where('usuario_id',$request->user()->id)->first();
        $carrera = Carrera::where('id',$estudiante->carrera_id)->first();
        $solicitud = Solicitud::create([
            'nombre_asignatura' => $request->nombreAsignatura,
            'detalle' => $request->detalle,
            'numero_de_telefono' => $request->telefono,
            'estado' => 0,
            'estudiante_id' => $estudiante->id,
            'carrera_id'=> $carrera->id,
        ]);
        InscripcionAsignatura::create([
            'nrc' => $request->nrc,
            'solicitud_id' => $solicitud->id,
        ]);
        return redirect('solicitud-alumno');
        }
        if($request->solicitud == 3)
        {

       $validator =  Validator::make($request->all(),[
        'telefono' => ['required', 'string','min:9','max:9'],
        'nrc' => ['required', 'string', 'max:4','min:4'],
        'nombreAsignatura' => ['required', 'string'],
        'detalle' => ['required', 'string'],
        ]);
        if ($validator->fails())
        {

            return  back()->withErrors($validator)->withInput($request->all());
        }
        $estudiante = Estudiante::where('usuario_id',$request->user()->id)->first();
        $carrera = Carrera::where('id',$estudiante->carrera_id)->first();
        $solicitud = Solicitud::create([
            'nombre_asignatura' => $request->nombreAsignatura,
            'detalle' => $request->detalle,
            'numero_de_telefono' => $request->telefono,
            'estado' => 0,
            'estudiante_id' => $estudiante->id,
            'carrera_id'=> $carrera->id,
        ]);
        InscripcionAsignatura::create([
            'nrc' => $request->nrc,
            'solicitud_id' => $solicitud->id,
        ]);
        return redirect('solicitud-alumno');
        }
        if($request->solicitud == 4)
        {

       $validator =  Validator::make($request->all(),[
        'telefono' => ['required', 'string','min:9','max:9'],
        'nota' => ['required', 'integer'],
        'nombreAsignatura' => ['required', 'string'],
        'cantidadAyudantias' => ['required', 'integer'],
        'detalle' => ['required', 'string'],
        ]);
        if ($validator->fails())
        {

            return  back()->withErrors($validator)->withInput($request->all());
        }
        $estudiante = Estudiante::where('usuario_id',$request->user()->id)->first();
        $carrera = Carrera::where('id',$estudiante->carrera_id)->first();
        $solicitud = Solicitud::create([
            'nombre_asignatura' => $request->nombreAsignatura,
            'detalle' => $request->detalle,
            'numero_de_telefono' => $request->telefono,
            'estado' => 0,
            'estudiante_id' => $estudiante->id,
            'carrera_id'=> $carrera->id,
        ]);
        $ayudantia = Ayudantia::create([
            'nota_aprobacion' => $request->nota,
            'cant_ayudantias' => $request->cantidadAyudantias,
            'solicitud_id' => $solicitud->id,
        ]);

        return redirect('solicitud-alumno');
        }

        if($request->solicitud == 5)
        {

            $validator =  Validator::make($request->all(),[
        'telefono' => ['required', 'string','min:9','max:9'],
        'nombreProfesor' => ['required', 'string'],
        'nombreAsignatura' => ['required', 'string'],
        'detalle' => ['required', 'string'],
        ]);
        if ($validator->fails())
        {

            return  back()->withErrors($validator)->withInput($request->all());
        }
        $estudiante = Estudiante::where('usuario_id',$request->user()->id)->first();
        $carrera = Carrera::where('id',$estudiante->carrera_id)->first();
        $solicitud = Solicitud::create([
            'nombre_asignatura' => $request->nombreAsignatura,
            'detalle' => $request->detalle,
            'numero_de_telefono' => $request->telefono,
            'estado' => 0,
            'estudiante_id' => $estudiante->id,
            'carrera_id'=> $carrera->id,
        ]);
        $facilidad = Facilidades::create([
            'nombre_profesor' => $request->nombreProfesor,
            'tipo_solicitud' => $request->facilidadAcademica,
            'solicitud_id' => $solicitud->id,
        ]);

        if($request->cantArchivos == 1)
        {
            $file0 = $request->file('file0');
            $nombreArchivo0 = $file0->getClientOriginalName();
            $file0->storeAs('public/archivos/',$nombreArchivo0);

            Archivo::create([
                'nombre_archivo' => $nombreArchivo0 ,
                'facilidad_id' => $facilidad->id,
            ]);
            dd("woa");
            return redirect('solicitud-alumno');

        }
        elseif($request->cantArchivos == 2)
        {
            $file0 = $request->file('file0');
            $nombreArchivo0 = $file0->getClientOriginalName();
            $file0->storeAs('public/archivos/',$nombreArchivo0);
            Archivo::create([
                'nombre_archivo' => $nombreArchivo0 ,
                'facilidad_id' => $facilidad->id,
            ]);

            $file1 = $request->file('file1');
            $nombreArchivo1 = $file1->getClientOriginalName();
            $file1->storeAs('public/archivos/',$nombreArchivo1);
            Archivo::create([
                'nombre_archivo' => $nombreArchivo1 ,
                'facilidad_id' => $facilidad->id,
            ]);
            return redirect('solicitud-alumno');
        }
        elseif($request->cantArchivos == 3){

            $file0 = $request->file('file0');
            $nombreArchivo0 = $file0->getClientOriginalName();
            $file0->storeAs('public/archivos/',$nombreArchivo0);
            Archivo::create([
                'nombre_archivo' => $nombreArchivo0 ,
                'facilidad_id' => $facilidad->id,
            ]);

            $file1 = $request->file('file1');
            $nombreArchivo1 = $file1->getClientOriginalName();
            $file1->storeAs('public/archivos/',$nombreArchivo1);
            Archivo::create([
                'nombre_archivo' => $nombreArchivo1 ,
                'facilidad_id' => $facilidad->id,
            ]);

            $file2 = $request->file('file2');
            $nombreArchivo2 = $file2->getClientOriginalName();
            $file2->storeAs('public/archivos/',$nombreArchivo2);
            Archivo::create([
                'nombre_archivo' => $nombreArchivo2 ,
                'facilidad_id' => $facilidad->id,
            ]);
            return redirect('solicitud-alumno');
        }
        else
        {

            return redirect('solicitud-alumno');
        }
        }


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

