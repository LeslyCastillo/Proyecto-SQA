<?php

namespace App\Http\Controllers;

use App\Models\TipoVehiculo;
use Illuminate\Http\Request;

class TiposVehiculosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $TiposVehiculos = TipoVehiculo::all();
        return view("tipos_vehiculos.index", compact("TiposVehiculos"));
    }

    public function created()
    {
        return view('tipos_vehiculos.created');
    }

    public function store(Request $request)
    {
        $tipo_vehiculo = new tipovehiculo;//modelo
        $tipo_vehiculo->descripcion = $request->descripcion;
        $tipo_vehiculo->save();
        return redirect()->route('tipos_vehiculos.index');//name de la ruta
    }
}
