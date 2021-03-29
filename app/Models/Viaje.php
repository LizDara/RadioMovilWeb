<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $table = 'viaje';

    protected $fillable = [
        'id', 'fecha', 'hora', 'puntopartida', 'puntollegada', 'monto', 'kilometro', 'movil_numeroplaca', 'cliente_ci', 'servicio_id'
    ];

    public $timestamps = false;
}
