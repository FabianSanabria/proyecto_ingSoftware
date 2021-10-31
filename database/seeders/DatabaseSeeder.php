<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
    }
}
