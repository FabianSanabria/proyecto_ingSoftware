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
     * Identifica que solicitud se quiere crear, para luego enviar la vista con el formulario correspondiente.
     * @param $request - Corresponde al request con la informacion de la solicitud
     * @return resources/views/solicitudAlumno/generarSolicitud
     */
    public function Solicitud(Request $request)
    {

        $solicitud = $request->solicitud;

        if ($solicitud == null) { // si es null es porque hubo un error en el envio del formulario de solicitud
            return view('solicitudAlumno.generarSolicitud');
        }
        if ($solicitud == 0) {
            $request->session()->flash('solicitud', 0);
            return view('solicitudAlumno.generarSolicitud');
        }
        if ($solicitud == 1) {
            $request->session()->flash('solicitud', 1);
            return view('solicitudAlumno.generarSolicitud');
        }
        if ($solicitud == 2) {
            $request->session()->flash('solicitud', 2);
            return view('solicitudAlumno.generarSolicitud');
        }
        if ($solicitud == 3) {
            $request->session()->flash('solicitud', 3);
            return view('solicitudAlumno.generarSolicitud');
        }
        if ($solicitud == 4) {
            $request->session()->flash('solicitud', 4);
            return view('solicitudAlumno.generarSolicitud');
        }
        if ($solicitud == 5) {
            $request->session()->flash('solicitud', 5);
            return view('solicitudAlumno.generarSolicitud');
        }
    }

    /**
     * Luego de hacer submit de los datos de la solicitud, se procede a crear esta, y ser guardada
     * la base de datos
     * @param $request - Corresponde al request con la informacion de la solicitud
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if ($request->solicitud == 0) {
            $validator =  Validator::make($request->all(),
        [
        'telefono' => ['required','regex:/(9)[0-9]{8}/'],
        'nrc' => ['required','regex:/[0-9]{5}/'],
        'nombreAsignatura' => ['required', 'string'],
        'detalle' => ['required', 'string'],
        ],
        [
            'telefono.regex' => 'Ingrese un número de teléfono válido',
            'nrc.regex' => 'Ingrese un NRC válido'
        ]


    );
            if ($validator->fails()) {
                $request->session()->put('solicitud', 0);
                return  back()->withErrors($validator)->withInput($request->all());
            }
            $estudiante = Estudiante::where('usuario_id', $request->user()->id)->first();
            $carrera = Carrera::where('id', $estudiante->carrera_id)->first();
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
            return redirect('solicitud-alumno')->with('message', 'Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
        }
        if ($request->solicitud == 1) {
            $validator =  Validator::make($request->all(), [
         'telefono' => ['required','regex:/(9)[0-9]{8}/'],
        'nrc' => ['required','regex:/[0-9]{5}/'],
        'nombreAsignatura' => ['required', 'string'],
        'detalle' => ['required', 'string'],
        ],
        [
            'telefono.regex' => 'Ingrese un número de teléfono válido',
            'nrc.regex' => 'Ingrese un NRC válido'
        ]);
            if ($validator->fails()) {
                $request->session()->put('solicitud', 1);
                return  back()->withErrors($validator)->withInput($request->all());
            }
            $estudiante = Estudiante::where('usuario_id', $request->user()->id)->first();
            $carrera = Carrera::where('id', $estudiante->carrera_id)->first();
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
            return redirect('solicitud-alumno')->with('message', 'Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
        }


        if ($request->solicitud == 2) {
            $validator =  Validator::make($request->all(), [
        'telefono' => ['required','regex:/(9)[0-9]{8}/'],
        'nrc' => ['required','regex:/[0-9]{5}/'],
        'nombreAsignatura' => ['required', 'string'],
        'detalle' => ['required', 'string'],
        ],
        [
            'telefono.regex' => 'Ingrese un número de teléfono válido',
            'nrc.regex' => 'Ingrese un NRC válido'
        ]);
            if ($validator->fails()) {
                $request->session()->put('solicitud', 2);
                return  back()->withErrors($validator)->withInput($request->all());
            }
            $estudiante = Estudiante::where('usuario_id', $request->user()->id)->first();
            $carrera = Carrera::where('id', $estudiante->carrera_id)->first();
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
            return redirect('solicitud-alumno')->with('message', 'Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
        }

        if ($request->solicitud == 3) {
            $validator =  Validator::make($request->all(), [
        'telefono' => ['required','regex:/(9)[0-9]{8}/'],
        'nrc' => ['required','regex:/[0-9]{5}/'],
        'nombreAsignatura' => ['required', 'string'],
        'detalle' => ['required', 'string'],
        ],
        [
            'telefono.regex' => 'Ingrese un número de teléfono válido',
            'nrc.regex' => 'Ingrese un NRC válido'
        ]);
            if ($validator->fails()) {
                $request->session()->put('solicitud', 3);
                return  back()->withErrors($validator)->withInput($request->all());
            }
            $estudiante = Estudiante::where('usuario_id', $request->user()->id)->first();
            $carrera = Carrera::where('id', $estudiante->carrera_id)->first();
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
            return redirect('solicitud-alumno')->with('message', 'Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
        }
        if ($request->solicitud == 4) {
            $validator =  Validator::make($request->all(), [
        'telefono' => ['required','regex:/(9)[0-9]{8}/'],
        'nota' => ['required', 'regex:/[0-9](.|,)[0-9]/'],
        'nombreAsignatura' => ['required', 'string'],
        'cantidadAyudantias' => ['required', 'integer','max:99','min:0'],
        'detalle' => ['required', 'string'],
        ],
        [
            'telefono.regex' => 'Ingrese un número de teléfono válido',
            'nota.regex' => 'Ingrese una nota válida'
        ]);
            if ($validator->fails()) {
                $request->session()->put('solicitud', 4);
                return  back()->withErrors($validator)->withInput($request->all());
            }
            $estudiante = Estudiante::where('usuario_id', $request->user()->id)->first();
            $carrera = Carrera::where('id', $estudiante->carrera_id)->first();
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

            return redirect('solicitud-alumno')->with('message', 'Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
        }

        if ($request->solicitud == 5) {
            $validator =  Validator::make($request->all(), [
        'telefono' => ['required', 'string','min:9','max:9'],
        'nombreProfesor' => ['required', 'string'],
        'nombreAsignatura' => ['required', 'string'],
        'detalle' => ['required', 'string'],
        'facilidadAcademica' => ['required','different:0'],
        'file0' => ['file','mimes:jpeg,png,jpg,pdf,docx,doc','max:10000'],
        'file1' => ['file','mimes:jpeg,png,jpg,pdf,docx,doc','max:10000'],
        'file2' => ['file','mimes:jpeg,png,jpg,pdf,docx,doc','max:10000'],
        ],
        [
            'telefono.regex' => 'Ingrese un número de teléfono válido',
            'file0.max' => 'Ingrese archivo con un peso menor a 10MB',
            'file1.max' => 'Ingrese archivo con un peso menor a 10MB',
            'file2.max' => 'Ingrese archivo con un peso menor a 10MB',
            'file0.mimes' => 'Ingrese archivo con extensión pdf, docx, doc, jpeg, png, jpg.',
            'file1.mimes' => 'Ingrese archivo con extensión pdf, docx, doc, jpeg, png, jpg.',
            'file2.mimes' => 'Ingrese archivo con extensión pdf, docx, doc, jpeg, png, jpg.',
        ]);
            if ($validator->fails()) {
                $request->session()->put('solicitud', 5);
                return  back()->withErrors($validator)->withInput($request->all());
            }
            $estudiante = Estudiante::where('usuario_id', $request->user()->id)->first();
            $carrera = Carrera::where('id', $estudiante->carrera_id)->first();
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

            if ($request->cantArchivos == 1) { // se crean archivos dependiendo de cuantos se subieron
                $file0 = $request->file('file0');
                $nombreArchivo0 = $file0->getClientOriginalName();
                $file0->storeAs('public/archivos/', $nombreArchivo0);

                Archivo::create([
                'nombre_archivo' => $nombreArchivo0 ,
                'facilidad_id' => $facilidad->id,
            ]);

                return redirect('solicitud-alumno')->with('message', 'Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
            } elseif ($request->cantArchivos == 2) {
                $file0 = $request->file('file0');
                $nombreArchivo0 = $file0->getClientOriginalName();
                $file0->storeAs('public/archivos/', $nombreArchivo0);
                Archivo::create([
                'nombre_archivo' => $nombreArchivo0 ,
                'facilidad_id' => $facilidad->id,
            ]);

                $file1 = $request->file('file1');
                $nombreArchivo1 = $file1->getClientOriginalName();
                $file1->storeAs('public/archivos/', $nombreArchivo1);
                Archivo::create([
                'nombre_archivo' => $nombreArchivo1 ,
                'facilidad_id' => $facilidad->id,
            ]);
                return redirect('solicitud-alumno')->with('message', 'Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
            } elseif ($request->cantArchivos == 3) {
                $file0 = $request->file('file0');
                $nombreArchivo0 = $file0->getClientOriginalName();
                $file0->storeAs('public/archivos/', $nombreArchivo0);
                Archivo::create([
                'nombre_archivo' => $nombreArchivo0 ,
                'facilidad_id' => $facilidad->id,
            ]);

                $file1 = $request->file('file1');
                $nombreArchivo1 = $file1->getClientOriginalName();
                $file1->storeAs('public/archivos/', $nombreArchivo1);
                Archivo::create([
                'nombre_archivo' => $nombreArchivo1 ,
                'facilidad_id' => $facilidad->id,
            ]);

                $file2 = $request->file('file2');
                $nombreArchivo2 = $file2->getClientOriginalName();
                $file2->storeAs('public/archivos/', $nombreArchivo2);
                Archivo::create([
                'nombre_archivo' => $nombreArchivo2 ,
                'facilidad_id' => $facilidad->id,
            ]);
                return redirect('solicitud-alumno')->with('message', 'Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
            } else {
                return redirect('solicitud-alumno')->with('message', 'Se ha creado la solicitud con id: #'.$solicitud->id.'. Con fecha: '.$solicitud->created_at);
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Solicitud $solicitud)
    {
        $solicitud = Solicitud::all();
        return view('solicitudAlumno.vistaSolicitud', compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Solicitud $solicitud)
    {
        $solicitud=$request->solicitud;
        $solicitud=Solicitud::all();

        if ($request->tipo == 0){
            $request->session()->flash('tipo', 0);
            return view('solicitudAlumno.editarAnularSolicitud') -> with('solicitud', $solicitud);
        }
        elseif ($request->tipo == 1) {
            $request->session()->flash('tipo', 1);
            return view('solicitudAlumno.editarAnularSolicitud') -> with('solicitud', $solicitud);
        }
        elseif ($request->tipo == 2) {
            $request->session()->flash('tipo', 2);
            return view('solicitudAlumno.editarAnularSolicitud') -> with('solicitud', $solicitud);
        }
        elseif ($request->tipo == 3) {
            $request->session()->flash('tipo', 3);
            return view('solicitudAlumno.editarAnularSolicitud') -> with('solicitud', $solicitud);
        }
        elseif ($request->tipo == 4) {
            $request->session()->flash('tipo', 4);
            return view('solicitudAlumno.editarAnularSolicitud') -> with('solicitud', $solicitud);
        }
        elseif ($request->tipo == 5) {
            $request->session()->flash('tipo', 5);
            return view('solicitudAlumno.editarAnularSolicitud') -> with('solicitud', $solicitud);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
    }

    public function update(Request $request, Solicitud $solicitud)
    {
        $request->validate(['id' => 'regex:/^[0-9]+$/']);
        $request->validate(['tipo' => 'required']);
        $request->validate(['numero_de_telefono' => 'regex:/^[0-9]+$/', 'required']);
        $request->validate(['nrc' => 'regex:/^[0-9]+$/', 'required']);
        $request->validate(['nombre_asignatura' => ['required', 'string', 'max:255']]);
        $request->validate(['nota_aprobacion' => 'required|numeric|between:0,99.99']);
        $request->validate(['cant_ayudantias' => 'regex:/^[0-9]+$/', 'required']);
        $request->validate(['nombre_profesor' => ['required', 'string', 'max:255']]);
        $request->validate(['tipo_solicitud' => 'regex:/^[0-9]+$/', 'required']);
        $request->validate(['detalle' => ['required', 'string', 'max:255']]);
        $request->validate(['archivo' => 'required']);
        $solicitud->id = $request->id;
        $solicitud->tipo = $request->tipo;
        $solicitud->numero_de_telefono = $request->numero_de_telefono;
        $solicitud->nrc = $request->nrc;
        $solicitud->nombre_asignatura = $request->nombre_asignatura;
        $solicitud->nota_aprobacion = $request->nota_aprobacion;
        $solicitud->cant_ayudantias = $request->cant_ayudantias;
        $solicitud->nombre_profesor = $request->nombre_profesor;
        $solicitud->tipo_solicitud = $request->tipo_solicitud;
        $solicitud->detalle = $request->detalle;
        $solicitud->archivo = $request->archivo;
        $solicitud->save();
        return redirect('/solicitud-alumno');
    }
}
