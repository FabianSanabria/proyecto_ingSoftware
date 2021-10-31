<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayudantia extends Model
{
    use HasFactory;
    protected $fillable = [

        'cant_ayudantias',
        'nota_aprobacion',
        'solicitud_id',

    ];
    public function solicitud() {
        return $this->hasOne(Solicitud::class);
    }
}
