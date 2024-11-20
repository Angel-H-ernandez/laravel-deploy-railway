<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rembolso_model extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "rembolso";
    protected $fillable = [
        'monto',
        'fecha',
        'id_sucursal',
        'id_usuario',
        "id_cliente"
    ];
}
