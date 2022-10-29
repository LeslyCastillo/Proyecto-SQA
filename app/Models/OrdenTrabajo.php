<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    use HasFactory;
    protected $table="orden_de_trabajo";
    protected $fillable=[
        'clientes_id',
        'vehiculos_id',
        'fecha_recepcion',
        'users_id'
    ];
}
