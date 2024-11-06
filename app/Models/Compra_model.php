<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra_model extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'compra';
    protected $fillable = [
        'id',
        'id_sucursal',
        'id_usuario',
        'descripcion',
        'fecha',
        'monto',
        'id_provedor',
    ];
}
