<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    use HasFactory;
    protected $table="tipos_de_pagos";
    protected $fillable=[
        'forma_de_pago'
    ];
}
