<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisos_subusuario_model extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'permisos_subusuario';

    protected $fillable = [
        "ver",
        "vender",
        "editar",
        "crear"
    ];

}
