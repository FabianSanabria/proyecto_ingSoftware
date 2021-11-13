<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JefedeCarrera extends Model
{
    protected $fillable = [
        'usuario_id',
    ];
    use HasFactory;
    public function user() {
        return $this->hasOne(User::class);
    }

}
