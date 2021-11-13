<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $fillable = [
        'detalle',
        'numero_de_telefono',
        'estado', // Pendiente = 0; Aceptada = 1; Aceptada con observaciones = 2; Rechazada = 3; Anulada = 4;
        'nombre_asignatura',
        'estudiante_id',
        'carrera_id',
        'tipo',
        'respuestaSolicitud',
    ];
    public function estudiante() {
        return $this->belongsTo(Estudiante::class);
    }
    public function carrera() {
        return $this->belongsTo(Carrera::class);
    }
}
