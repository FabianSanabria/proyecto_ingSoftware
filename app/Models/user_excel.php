<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_excel extends Model
{
    use HasFactory;

    protected $fillable = [
        'agregado',
        'rut',
        'nombre',
        'carrera',
        'correo',
    ];
}
