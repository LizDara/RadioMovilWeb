<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promocion';

    protected $fillable = [
        'id', 'nombre', 'fechainicio', 'fechafin', 'descuento', 'servicio_id'
    ];

    public $timestamps = false;
}
