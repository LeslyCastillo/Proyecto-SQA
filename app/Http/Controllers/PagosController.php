<?php

namespace App\Http\Controllers;

use App\Models\Helper;
use App\Models\OrdenTrabajo;
use App\Models\Pago;
use App\Models\TipoPago;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class PagosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pagos = Pago::join('orden_de_trabajo', 'orden_de_trabajo.id', '=', 'pagos.orden_de_trabajo_id')
            ->join('clientes', 'clientes.id', '=', 'orden_de_trabajo.clientes_id')
            ->select('clientes.nit', 'clientes.nombre', 'pagos.*')->get();
        return view("pagos.index", compact("pagos"));
    }

    public function created()
    {
        $tipo_pago = TipoPago::all();
        return view('pagos.created', compact("tipo_pago"));
    }

    public function store(Request $request)
    {
        $pago = new pago;//modelo
        $pago->fecha = now();
        $pago->total = $request->total;
        $pago->orden_de_trabajo_id = $request->id;
        $pago->tipo_de_pago = $request->tipoPago;
        $pago->save();

        $orden = OrdenTrabajo::find($request->id);
        $orden->estatus = Helper::$PAGADA;
        $orden->save();

        $vehiculo = Vehiculo::find($orden->vehiculos_id);
        $vehiculo->estado = "Alquilado";
        $vehiculo->save();

        return redirect()->route('pagos.index');//name de la ruta
    }
}
