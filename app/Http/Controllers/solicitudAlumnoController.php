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
use Symfony\Component\HttpFoundation\Session\Session;

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
    { // funcion que maneja formulario inicial en la cual se elije el tipo de solicitud a enviar

        $solicitud = $request->solicitud;

        if($solicitud == null){ // si es null es porque hubo un error en el envio del formulario de solicitud
            return view('solicitudAlumno.generarSolicitud');

        }
        if($solicitud == 0){
            $request->session()->flash('solicitud',0);
            return view('solicitudAlumno.generarSolicitud');
        }
        if($solicitud == 1){
            $request->session()->flash('solicitud',1);
            return view('solicitudAlumno.generarSolicitud');
        }
        if($solicitud == 2){
            $request->session()->flash('solicitud',2);
            return view('solicitudAlumno.generarSolicitud');

        }
        if($solicitud == 3){
            $request->session()->flash('solicitud',3);
            return view('solicitudAlumno.generarSolicitud');

        }
        if($solicitud == 4){
            $request->session()->flash('solicitud',4);
            return view('solicitudAlumno.generarSolicitud');

        }
        if($solicitud == 5){
            $request->session()->flash('solicitud',5);
            return view('solicitudAlumno.generarSolicitud');

        }

    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    { // funcion que maneja la creacion de las solicitudes,

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

            $request->session()->put('solicitud', 0);
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
            'tipo'=> 0,
        ]);
        Sobrecupo::create([
            'nrc' => $request->nrc,
            'solicitud_id' => $solicitud->id,
        ]);
        return redirect('solicitud-alumno')->with('message','Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);

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

            $request->session()->put('solicitud', 1);
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
            'tipo'=> 1,
        ]);
        CambioParalelo::create([
            'nrc' => $request->nrc,
            'solicitud_id' => $solicitud->id,
        ]);
        return redirect('solicitud-alumno')->with('message','Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
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

            $request->session()->put('solicitud', 2);
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
            'tipo'=> 2,
        ]);
        EliminacionAsignatura::create([
            'nrc' => $request->nrc,
            'solicitud_id' => $solicitud->id,
        ]);
        return redirect('solicitud-alumno')->with('message','Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
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

            $request->session()->put('solicitud', 3);
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
            'tipo'=> 3,
        ]);
        InscripcionAsignatura::create([
            'nrc' => $request->nrc,
            'solicitud_id' => $solicitud->id,
        ]);
        return redirect('solicitud-alumno')->with('message','Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
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

            $request->session()->put('solicitud', 4);
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
            'tipo'=> 4,
        ]);
        $ayudantia = Ayudantia::create([
            'nota_aprobacion' => $request->nota,
            'cant_ayudantias' => $request->cantidadAyudantias,
            'solicitud_id' => $solicitud->id,
        ]);

        return redirect('solicitud-alumno')->with('message','Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
    }

        if($request->solicitud == 5)
        {

            $validator =  Validator::make($request->all(),[
        'telefono' => ['required', 'string','min:9','max:9'],
        'nombreProfesor' => ['required', 'string'],
        'nombreAsignatura' => ['required', 'string'],
        'detalle' => ['required', 'string'],
        'facilidadAcademica' => ['required'],
        ]);
        if ($validator->fails())
        {

            $request->session()->put('solicitud', 5);
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
            'tipo'=> 5,
        ]);

        $facilidad = Facilidades::create([
            'nombre_profesor' => $request->nombreProfesor,
            'tipo_solicitud' => $request->facilidadAcademica,
            'solicitud_id' => $solicitud->id,
        ]);

        if($request->cantArchivos == 1) // se crean archivos dependiendo de cuantos se subieron
        {
            $file0 = $request->file('file0');
            $nombreArchivo0 = $file0->getClientOriginalName();
            $file0->storeAs('public/archivos/',$nombreArchivo0);

            Archivo::create([
                'nombre_archivo' => $nombreArchivo0 ,
                'facilidad_id' => $facilidad->id,
            ]);

            return redirect('solicitud-alumno')->with('message','Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);

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
            return redirect('solicitud-alumno')->with('message','Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
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
            return redirect('solicitud-alumno')->with('message','Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
        }
        else
        {

            return redirect('solicitud-alumno')->with('message','Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
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

