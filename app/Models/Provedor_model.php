<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provedor_model extends Model
{

    use HasFactory;
    public $timestamps = false; //desactivar columnas de tiempó
    protected $table = 'provedor';

    protected $fillable = [
        'id',
        'nombre',
        'correo',
        'telefono',
        'id_usuario',
    ];
}
