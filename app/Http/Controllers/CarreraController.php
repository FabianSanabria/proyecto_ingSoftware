<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search == null) {
            $carreras = Carrera::simplePaginate(100);
            return view('carrera.index')->with('carreras',$carreras);
        }else {
            $carreras = Carrera::where('codigo', $request->search)->simplePaginate(1);
            return view('carrera.index')->with('carreras',$carreras);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carrera.create');
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
            'nombre' => ['required', 'string', 'max:255']
            //'regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/' Quitando el regex se elimina que no deje ingresar numeros en el nombre.
        ]);

        Carrera::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre
        ]);

        return redirect('/carrera')->with('message',"Carrera creada con éxito");
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
    public function edit(Carrera $carrera)
    {
        return view('carrera.edit')->with('carrera',$carrera);
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
        $request->validate(['nombre' => ['required', 'string', 'max:255']]);
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
