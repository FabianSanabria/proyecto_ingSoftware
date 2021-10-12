<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'rut' => ['required', 'string', 'max:255', 'unique:users','regex:/^[0-9]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'rolSelect' =>['required','regex:(Estudiante|Jefe de Carrera)'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        if(strcmp($_POST['rolSelect'],"Estudiante") == 0)
        {
            $rolNum = 0;

        }
        if(strcmp($_POST['rolSelect'],"Jefe de Carrera") == 0)
        {
            $rolNum = 1;

        }


        if (isset($_POST['status'])) {

            // Checkbox is selected
            return User::create([

                'name' => $data['name'],
                'email' => $data['email'],
                'rut' => $data['rut'],
                'status' => true,
                'password' => Hash::make($data['password']),
                'rol' => $rolNum,
            ]);

        }else{
            return User::create([

                'name' => $data['name'],
                'email' => $data['email'],
                'rut' => $data['rut'],
                'status' => false,
                'password' => Hash::make($data['password']),
                'rol' => $rolNum,
            ]);
        }




    }
}
