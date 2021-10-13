<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'rut';
    }
    /**
     * Autentificacion del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->status == 0) {

            $message = 'Usted no está autorizado para acceder al sistema. Contacte al administrador';

            // Desloguea al usuario.
            $this->logout($request);

            // Devuelve al usuario al formulario de logueo.
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([

                    $this->username() => $message,//enviamos mensaje
                ]);
        }
    }
}
