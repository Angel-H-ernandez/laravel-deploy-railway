<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol_subusuario_model extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'rol_subusuario';

    protected $fillable = [
        'id',
        'nombre',
        'id_permisos_subusuario'
    ];
}
