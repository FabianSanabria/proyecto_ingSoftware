<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rut')->unique();
            $table->string('email')->unique();
            $table->boolean('status');   //1: habilitado 0: deshabilitado
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('rol');  //Usuario = 0 ; Jefe de Carrera = 1 ; Administrador = 2
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
