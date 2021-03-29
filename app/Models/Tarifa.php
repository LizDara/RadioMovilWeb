<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $table = 'tarifa';

    protected $fillable = [
        'id', 'precio', 'kilometro', 'servicio_id'
    ];

    public $timestamps = false;
}
