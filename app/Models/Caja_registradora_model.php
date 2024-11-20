<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja_registradora_model extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "caja_registradora";
    protected $fillable = [
        'id_trabajador',
        'id_sucursal',
        'id_usuario',
        'dinero'
    ];
}
