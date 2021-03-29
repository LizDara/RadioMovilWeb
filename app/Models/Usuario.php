<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';

    protected $fillable = [
        'ci', 'nombre', 'apellido', 'fechanacimiento', 'direccion', 'telefono', 'correo', 'contrasena', 'tipo'
    ];

    protected $primaryKey = 'ci';

    public $incrementing = false;

    public $timestamps = false;

    public static function find($ci) {
        return static::where('ci', compact('ci'))->first();
    }
}
