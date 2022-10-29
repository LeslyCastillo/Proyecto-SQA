<?php

namespace App\Http\Controllers;

use App\Models\DetalleOrdenes;
use App\Models\OrdenTrabajo;
use App\Models\Pago;
use Barryvdh\DomPDF\Facade\Pdf;



class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function streamPDF($id){
        $orden = OrdenTrabajo::join('vehiculos', 'vehiculos.id', '=', 'orden_de_trabajo.vehiculos_id')
            ->join('clientes', 'clientes.id', '=', 'orden_de_trabajo.clientes_id')
            ->join('marcas', 'marcas.id', '=', 'vehiculos.marcas_id')
            ->join('lineas', 'lineas.id', '=', 'vehiculos.lineas_id')
            ->join('tipo_vehiculos', 'tipo_vehiculos.id', '=', 'vehiculos.tipo_vehiculos_id')
            ->where('orden_de_trabajo.id', $id)
            ->select('orden_de_trabajo.fecha_inicial', 'orden_de_trabajo.fecha_final', 'clientes.nombre', 'clientes.nit',
                'clientes.direccion',
                'clientes.correo',
                'clientes.telefono',
                'vehiculos.placa',
                'vehiculos.color',
                'vehiculos.modelo',
                'marcas.marca',
                'lineas.linea',
                'tipo_vehiculos.descripcion',
                'orden_de_trabajo.estatus',
                'orden_de_trabajo.id'
            )->first();
        $detalle = DetalleOrdenes::where('orden_de_trabajo_id',$orden->id)
            ->join('servicios', 'servicios.id', '=', 'detalle_ordenes_trabajo.servicios_id')
            ->get();


        $vista = view('pdf.orden', compact('orden','detalle'));
        return PDF::loadHTML($vista)
            ->setPaper('letter')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'defaultFont' => 'sans-serif'])
            ->stream('ALQUILERQ - SQA - '.$orden->id.'.pdf');
    }

    public function streamComprobantePDF($id){
        $pago = Pago::where('pagos.id', $id)->join('orden_de_trabajo', 'orden_de_trabajo.id', '=', 'pagos.orden_de_trabajo_id')
            ->join('clientes', 'clientes.id', '=', 'orden_de_trabajo.clientes_id')
            ->join('vehiculos', 'vehiculos.id', '=', 'orden_de_trabajo.vehiculos_id')
            ->join('marcas', 'marcas.id','=', 'vehiculos.marcas_id')
            ->join('tipo_vehiculos', 'tipo_vehiculos.id', '=', 'vehiculos.tipo_vehiculos_id')
            ->select('clientes.nit', 'clientes.nombre', 'clientes.direccion', 'vehiculos.placa', 'marcas.marca',
                'vehiculos.color', 'tipo_vehiculos.descripcion','pagos.*')->first();


        $detalle = DetalleOrdenes::where('orden_de_trabajo_id',$pago->orden_de_trabajo_id)
            ->join('servicios', 'servicios.id', '=', 'detalle_ordenes_trabajo.servicios_id')
            ->get();

        $vista = view('pdf.comprobante', compact('pago', 'detalle'));
        return PDF::loadHTML($vista)
            ->setPaper('letter')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->stream('ALQUILERQ - SQA - '.$pago->id.'.pdf');


    }
}
