<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movil extends Model
{
    protected $table = 'movil';

    protected $fillable = [
        'numeroplaca', 'color', 'marca', 'modelo', 'anho', 'tipo', 'estado', 'parada_id', 'chofer_ci'
    ];

    protected $primaryKey = 'numeroplaca';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    public static function find($numeroplaca) {
        return static::where('numeroplaca', compact('numeroplaca'))->first();
    }
}
