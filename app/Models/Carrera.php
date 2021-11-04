<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable = [
       'nombre',
       'codigo',
       'jefe_carrera_id',
    ];

    public function estudiantes(){
        return $this->hasMany(Estudiante::class);
    }
    public function jefedecarrera(){
        return $this->hasOne(JefedeCarrera::class);
    }
    public function solicitudes() {
        return $this->hasMany(Solicitud::class);
    }
}

