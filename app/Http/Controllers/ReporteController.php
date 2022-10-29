<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function vehiculos($placa){
        $vehiculos = OrdenTrabajo::join("vehiculos", "orden_de_trabajo.vehiculos_id", "=", "vehiculos.id")
            ->join("marcas", "marcas.id", "=", "vehiculos.marcas_id")
            ->join("lineas", "lineas.id", "=", "vehiculos.lineas_id")
            ->join("tipo_vehiculos", "tipo_vehiculos.id", "=", "vehiculos.tipo_vehiculos_id")
            ->join("clientes", "clientes.id", "=", "orden_de_trabajo.clientes_id")
            ->join("detalle_ordenes_trabajo", "detalle_ordenes_trabajo.orden_de_trabajo_id", "=", "orden_de_trabajo.id")
            ->join("servicios", "servicios.id", "=", "detalle_ordenes_trabajo.servicios_id")
            ->where('vehiculos.placa', $placa)
            ->select("vehiculos.*", "lineas.linea", "marcas.marca", "tipo_vehiculos.descripcion", "clientes.nit",
                "clientes.nombre", "orden_de_trabajo.id as no_orden", "detalle_ordenes_trabajo.total", "servicios.servicio")->get();
        return view("reportes.vehiculos", compact("vehiculos"));
    }

    public function clientes($nit){
        $vehiculos = OrdenTrabajo::join("vehiculos", "orden_de_trabajo.vehiculos_id", "=", "vehiculos.id")
            ->join("marcas", "marcas.id", "=", "vehiculos.marcas_id")
            ->join("lineas", "lineas.id", "=", "vehiculos.lineas_id")
            ->join("tipo_vehiculos", "tipo_vehiculos.id", "=", "vehiculos.tipo_vehiculos_id")
            ->join("clientes", "clientes.id", "=", "orden_de_trabajo.clientes_id")
            ->join("detalle_ordenes_trabajo", "detalle_ordenes_trabajo.orden_de_trabajo_id", "=", "orden_de_trabajo.id")
            ->join("servicios", "servicios.id", "=", "detalle_ordenes_trabajo.servicios_id")
            ->where('clientes.nit', $nit)
            ->select("vehiculos.*", "lineas.linea", "marcas.marca", "tipo_vehiculos.descripcion", "clientes.nit",
                "clientes.nombre", "orden_de_trabajo.id as no_orden", "detalle_ordenes_trabajo.total", "servicios.servicio")->get();
        return view("reportes.clientes", compact("vehiculos")); //es de clientes pero lo deje como vehiculos
    }

    public function periodo(Request $request )
    {
        if ($request->has('start')) {
            $start=$request->start;
            $end=$request->end;
            $vehiculos = OrdenTrabajo::join("vehiculos", "orden_de_trabajo.vehiculos_id", "=", "vehiculos.id")
                ->join("marcas", "marcas.id", "=", "vehiculos.marcas_id")
                ->join("lineas", "lineas.id", "=", "vehiculos.lineas_id")
                ->join("tipo_vehiculos", "tipo_vehiculos.id", "=", "vehiculos.tipo_vehiculos_id")
                ->join("clientes", "clientes.id", "=", "orden_de_trabajo.clientes_id")
                ->join("detalle_ordenes_trabajo", "detalle_ordenes_trabajo.orden_de_trabajo_id", "=", "orden_de_trabajo.id")
                ->join("servicios", "servicios.id", "=", "detalle_ordenes_trabajo.servicios_id")
                ->whereBetween('detalle_ordenes_trabajo.created_at', [$request->start, $request->end])
                ->select("vehiculos.*", "lineas.linea", "marcas.marca", "tipo_vehiculos.descripcion", "clientes.nit",
                    "clientes.nombre", "orden_de_trabajo.id as no_orden", "detalle_ordenes_trabajo.total", "servicios.servicio")->get();
            return view("reportes.periodo", compact("vehiculos", "start", "end")); //es de clientes pero lo deje como vehiculos
        }
        else{
            $start="";
            $end="";
            return view("reportes.periodo", compact("start", "end"));
        }
    }
}
