<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilidades extends Model
{

    use HasFactory;
    protected $fillable = [

        'nombre_profesor',
        'tipo_solicitud',
        'solicitud_id',

    ];
    public function solicitud() {
        return $this->hasOne(Solicitud::class);
    }
    public function Archivos() {
        return $this->hasMany(Archivo::class);
    }
}
