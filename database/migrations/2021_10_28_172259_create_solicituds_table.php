<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('detalle');
            $table->string('numero_de_telefono');
            $table->integer('estado'); // Pendiente = 0; Aceptada = 1; Aceptada con observaciones = 2; Rechazada = 3; Anulada = 4;
            $table->string('nombre_asignatura');
            $table->string('tipo');
            $table->string('respuestaSolicitud')->nullable();
            //claves foraneas
            $table->unsignedBigInteger('estudiante_id')->nullable();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('set null');
            $table->unsignedBigInteger('carrera_id');
            $table->foreign('carrera_id')->references('id')->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
}
