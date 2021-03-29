<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parada extends Model
{
    protected $table = 'parada';

    protected $fillable = [
        'id', 'nombre', 'direccion'
    ];

    public $timestamps = false;
}
