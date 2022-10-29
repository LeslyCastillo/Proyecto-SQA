<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $table="vehiculos";
    protected $fillable=[
        'placa',
        'modelo',
        'color',
        'lineas_id',
        'tipo_vehiculos_id'
    ];

    public function tipo_vehiculo(){
        return $this->hasOne(TipoVehiculo::class, 'id', 'tipo_vehiculos_id');
    }
    public function linea(){
        return $this->hasOne(Linea::class, 'id', 'lineas_id');
    }
    public function marca(){
        return $this->hasOne(Marca::class, 'id', 'marcas_id');
    }
}
