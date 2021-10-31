<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sobrecupo extends Model
{
    use HasFactory;
    protected $fillable = [

        'nrc',
        'solicitud_id',

    ];
    public function solicitud() {
        return $this->hasOne(Solicitud::class);
    }
}
