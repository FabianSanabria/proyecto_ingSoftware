<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilidades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_profesor');
            $table->integer('tipo_solicitud');// 0 = Licencia medica o cert. medico; 1 = Inasistencia por fuerza mayor; 2 = Representacion de la universidad; 3 = Inasistencia a clases por motivos personales o familiares
            $table->timestamps();
            $table->unsignedBigInteger('solicitud_id');
            $table->foreign('solicitud_id')->references('id')->on('solicituds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facilidades');
    }
}
