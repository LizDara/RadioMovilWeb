<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permiso';

    protected $fillable = [
        'id', 'fechasolicitud', 'fechainicio', 'fechafin', 'motivo', 'estado', 'chofer_ci'
    ];

    public $timestamps = false;
}
