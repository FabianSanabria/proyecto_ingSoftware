<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Estudiante extends Model
{
    protected $fillable = [
        'carrera_id',
        'usuario_id',
    ];
    use HasFactory;
    public function user() {
        return $this->hasOne(User::class);
    }
    public function carrera() {
        return $this->belongsTo(Carrera::class);
    }
    public function solicitudes() {
        return $this->hasMany(Solicitud::class,'estudiante_id');
    }

}
