<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente_model extends Model
{
    use HasFactory;
    protected $table = "cliente";
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre',
        'telefono',
        'email',
        'id_usuario'
    ];
}
