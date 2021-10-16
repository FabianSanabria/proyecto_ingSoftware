<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EditarUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search == null) {
            $usuarios = User::simplePaginate(5);
            return view('usuario.edit')->with('usuarios',$usuarios);
        }else {
            $usuarios = User::where('rut', $request->search)->simplePaginate(1);
            return view('usuario.edit')->with('usuarios',$usuarios);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        $request->validate(['rut' => 'regex:!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/]');
        $request->validate(['nombre' => 'regex:/^[A-z]+$/']);
        $request->validate(['correo' => 'regex:^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$']);
        $request->validate(['carrera' => 'regex:/^[A-z]+$/']);
        $user->nombre = $request->nombre;
        $user->rut = $request->rut;
        $user->correo = $request->correo;
        $user->carrera = $request->carrera;
        $user->save();
        return redirect('/editar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
