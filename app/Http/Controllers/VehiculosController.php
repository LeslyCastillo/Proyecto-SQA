<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use App\Models\Marca;
use App\Models\OrdenTrabajo;
use App\Models\TipoVehiculo;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->has('placa') ? $placa = $request->placa : $placa = false;

        $vehiculos = Vehiculo::query()
            ->join("marcas", "marcas.id", "=", "vehiculos.marcas_id")
            ->join("lineas", "lineas.id", "=", "vehiculos.lineas_id")
            ->join("tipo_vehiculos", "tipo_vehiculos.id", "=", "vehiculos.tipo_vehiculos_id")
            ->when($placa, function($query,$placa){
                return $query->where('placa', 'like', $placa);
            })
            ->select("vehiculos.*", "lineas.linea", "marcas.marca", "tipo_vehiculos.descripcion")->get();
        return view("vehiculos.index", compact("vehiculos"));
    }

    public function created()
    {
        $marcas = Marca::all();
        $lineas = Linea::all();
        $tipo_vehiculo = TipoVehiculo::all();
        return view('vehiculos.created', compact("marcas", "lineas", "tipo_vehiculo"));
    }

    public function store(Request $request)
    {
        $vehiculo = new vehiculo;//modelo
        $vehiculo->placa = strtoupper($request->placa);
        $vehiculo->modelo = $request->modelo;
        $vehiculo->color = strtoupper($request->color)  ;
        $vehiculo->marcas_id = $request->marca;
        $vehiculo->lineas_id = $request->linea;
        $vehiculo->estado = "Disponible";
        $vehiculo->tipo_vehiculos_id = $request->tipovehiculo;
        $vehiculo->save();
        return redirect()->route('vehiculos.index');//name de la ruta
    }
}
