<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
    use HasFactory;
    public static $ORDEN_CREADA = 1;
    public static $ORDEN_PROCESO = 2;
    public static $ORDEN_ESPERA = 3;
    public static $ORDEN_PENDIENTE_PAGO = 4;
    public static $PAGADA = 5;

    public static $EFECTIVO = 1;
    public static $CHEQUE = 2;

}
