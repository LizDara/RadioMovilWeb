<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    protected $table = 'falta';

    protected $fillable = [
        'id', 'fecha', 'motivo', 'chofer_ci', 'admin_ci'
    ];

    public $timestamps = false;
}
