<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal_model extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'sucursal';

    protected $fillable = [
        'id',
        'nombre',
        'direccion',
        'telefono',
        'id_usuario',
    ];
}
