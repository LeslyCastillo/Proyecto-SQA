<?php

namespace App\Http\Controllers;

use App\Models\TipoPago;
use Illuminate\Http\Request;

class TiposPagosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $TiposPagos = TipoPago::all();
        return view("tipos_pagos.index", compact("TiposPagos"));
    }

    public function created()
    {
        return view('tipos_pagos.created');
    }

    public function store(Request $request)
    {
        $tipo_pago = new tipopago;//modelo
        $tipo_pago->forma_de_pago = $request->forma_de_pago;
        $tipo_pago->save();
        return redirect()->route('tipos_pagos.index');//name de la ruta
    }
}
