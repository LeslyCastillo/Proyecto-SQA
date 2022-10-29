<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table="pagos";
    protected $fillable=[
        'fecha',
        'total',
        'orden_trabajo_id',
        'tipos_de_pagos_id'
    ];
}
