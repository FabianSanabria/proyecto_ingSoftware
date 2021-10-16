<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class administrarUsuarioController extends Controller
{
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

    public function index(Request $request){

            return view('usuario.index');


    }





}
