<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Carrera;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => "admin",
            'rut' => 1111111,
            'email' => "hola@gmail.com",
            'password' => Hash::make('hola1234'),
            'rol' => '2',
            'status' => true,

        ]);
        $carrera1 = Carrera:: create([
            'nombre' => "Arquitectura",
            'codigo' => "8039"

        ]);
        $carrera2 = Carrera:: create([
            'nombre' => "Derecho",
            'codigo' => "8043"

        ]);
        $carrera3 = Carrera:: create([
            'nombre' => "Geología",
            'codigo' => "8050"

        ]);
        $carrera4 = Carrera:: create([
            'nombre' => "Ingeniería Civil Ambiental",
            'codigo' => "8055"

        ]);
        $carrera5 = Carrera:: create([
            'nombre' => "Ingeniería Civil de Minas",
            'codigo' => "8074"

        ]);
        $carrera6 = Carrera:: create([
            'nombre' => "Ingeniería Civil en Computación e Informática	",
            'codigo' => "8603"

        ]);
        $carrera7 = Carrera:: create([
            'nombre' => "Ingeniería Civil Industrial	",
            'codigo' => "8092"

        ]);
        $carrera8 = Carrera:: create([
            'nombre' => "Ingeniería Civil Metalúrgica",
            'codigo' => "8132"

        ]);
        $carrera9 = Carrera:: create([
            'nombre' => "Ingeniería Civil Plan Común",
            'codigo' => "8141"

        ]);
        $carrera10 = Carrera:: create([
            'nombre' => "Ingeniería Civil Química",
            'codigo' => "8150"

        ]);
        $carrera11 = Carrera:: create([
            'nombre' => "Ingeniería Comercial",
            'codigo' => "8182"

        ]);
        $carrera12 = Carrera:: create([
            'nombre' => "Ingeniería en Computación e Informática",
            'codigo' => "8184"

        ]);
        $carrera13 = Carrera:: create([
            'nombre' => "Ingeniería en Información y Control de Gestión",
            'codigo' => "8189"

        ]);
        $carrera14 = Carrera:: create([
            'nombre' => "Ingeniería en Metalurgia",
            'codigo' => "8221"

        ]);
        $carrera15 = Carrera:: create([
            'nombre' => "Ingeniería en Tecnologías de Información",
            'codigo' => "8222"

        ]);
        $carrera16 = Carrera:: create([
            'nombre' => "Kinesiología",
            'codigo' => "8277"

        ]);
        $carrera17 = Carrera:: create([
            'nombre' => "Licenciatura en Física con mención en Astronomía",
            'codigo' => "8305"

        ]);
        $carrera18 = Carrera:: create([
            'nombre' => "Licenciatura en Matemática	",
            'codigo' => "8349"

        ]);
        $carrera19 = Carrera:: create([
            'nombre' => "Medicina",
            'codigo' => "8421"

        ]);
        $carrera20 = Carrera:: create([
            'nombre' => "Nutrición y Dietética",
            'codigo' => "8440"

        ]);
        $carrera21 = Carrera:: create([
            'nombre' => "Pedagogía en Educación Básica con Especialización",
            'codigo' => "8474"

        ]);
        $carrera22 = Carrera:: create([
            'nombre' => "Pedagogía en Inglés",
            'codigo' => "8481"

        ]);
        $carrera23 = Carrera:: create([
            'nombre' => "Pedagogía en Matemática en Educación Media",
            'codigo' => "8486"

        ]);
        $carrera24 = Carrera:: create([
            'nombre' => "Periodismo",
            'codigo' => "8570"

        ]);
        $carrera25 = Carrera:: create([
            'nombre' => "Psicología",
            'codigo' => "8594"

        ]);
        $carrera26 = Carrera:: create([
            'nombre' => "Química y Farmacia",
            'codigo' => "8659"

        ]);
    }
}
