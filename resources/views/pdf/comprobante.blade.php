<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>RENTAQL - SQA - {{$pago->id}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
    body {
        font-family:  Arial,sans-serif;
        font-size: 14px;
        line-height: 20px;
        max-height: 100%;
        width: 100%;
        max-width: 100%;
    }
    .field {
        font-size: 15px;
    }
    .text-data{
        font-size: 14px;
    }
    @page {
        margin-top: 0.5cm;
        margin-bottom: 2cm;
        margin-left: 2cm;
        margin-right: 1cm;
    }

    .separador {
        border-bottom: #3f9ae5;
        border-bottom-width: thick;
    }
    .layer1{
        margin-top: 10px;
    }
    .layer2{
        margin-top: 20px;
    }
    .bg-azul{
        background: #483d8b;
        height:3px;
    }
    #watermark {
        position: fixed;
        bottom:   10cm;
        opacity: 0.3;
        left:     3cm;
        width:    12cm;
        height:   8cm;
        z-index:  -1000;
    }
    footer {
        position: fixed;
        bottom: -55px;
        left: 0px;
        right: 0px;
        height: 175px;
    }
</style>
<body>
<div class="row">
    <div class="col-xs-2">
        <img src="https://i.imgur.com/nuv6URk.png" style="height: 80px; width: 100%; margin-top: 5px; line-height: 5px;margin-bottom: 0;" />
    </div>
    <div class="col-xs-4 text-center">
        <p >
        <h3 class="text-center">RECIBO</h3>
        Ruta Principal <br>
        Puerto Barrios, Izabal, Guatemala <br>
        Tel.: 1234-5678 - Fax: 5267-5638
        </p>
    </div>
    <div class="col-xs-4">
        <div>
           <b> Fecha De Pago:</b> {{\Carbon\Carbon::create($pago->fecha)->format('d-m-Y')}}<br>
           <b> Forma De Pago: </b> @if($pago->tipo_de_pago==1)
                Efectivo
            @elseif($pago->tipo_de_pago==2)
                Cheque
            @elseif($pago->tipo_de_pago==3)
                Tarjeta de Crédito
            @elseif($pago->tipo_de_pago==4)
                Deposito
            @elseif($pago->tipo_de_pago==5)
                Paypal
            @elseif($pago->tipo_de_pago==6)
                Bitcoin
            @else
                No asignado
            @endif
            <br>
            <b>Número De Orden:</b> {{$pago->orden_de_trabajo_id}}
        </div>
    </div>
</div>
<br>
<style>
    table{border-radius: 10px 10px 0 0 ; border-collapse: collapse; overflow: hidden}
</style>
<table class="table table-bordered">
    <tbody>
    <tr>
        <th colspan="4" class="text-center" style=" background: #d9dcd9; ">DATOS</th>
    </tr>
    <tr>
        <td class="text-center" scope="row"><b>NIT:</b> <br> {{$pago->nit}}</td>
        <td  colspan="2" class="text-center" scope="row"><b>NOMBRE:</b> <br> {{$pago->nombre}}</td>
        <td class="text-center" scope="row"><b>DIRECCIÓN:</b> <br> {{$pago->direccion}}</td>

    </tr>
    <tr>
        <td class="text-center" scope="row"><b>PLACA:</b> <br> {{$pago->placa}}</td>
        <td class="text-center" scope="row"><b>MARCA:</b> <br> {{$pago->marca}}</td>
        <td class="text-center" scope="row"><b>COLOR:</b> <br> {{$pago->color}}</td>
        <td class="text-center" scope="row"><b>TIPO DE VEHÍCULO:</b> <br> {{$pago->descripcion}}</td>

    </tr>
    </tbody>
</table>
{{--<table class="table table-bordered">--}}
{{--    <tbody>--}}
{{--    <tr>--}}
{{--        <th colspan="4" class="text-center"  style=" background: #d9dcd9; ">DATOS DEL VEHÍCULO</th>--}}
{{--    </tr>--}}
{{--   --}}
{{--    </tbody>--}}
{{--</table>--}}

<table class="table table-bordered">
    <tbody>
    <tr>
        <th colspan="3" class="text-center" style=" background: #d9dcd9; ">SERVICIOS SOLICITADOS</th>
    </tr>
    <tr>
        <th><b>SERVICIO:</b> </th>
        <th><b>OBSERVACIONES:</b></th>
        <th><b>PRECIO:</b> </th>
    </tr>
    @foreach($detalle as $servicio)

        <tr>
            <td class="text-center">{{$servicio->servicio}}</td>
            <td class="text-center">{{$servicio->observaciones}}</td>
            <td class="text-center">{{$servicio->total}}</td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td class="text-right">
            <b>TOTAL:</b>
        </td>
        <td class="text-center">{{$detalle->sum('total')}}</td>
    </tr>
    </tbody>
</table>
<footer>
    <div class="row" style="margin-bottom: 25px!important;">
        <div class="col-xs-5" style="line-height: 15px">
            f/<br>
            ______________________________________ <br>
            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            CAJA
        </div>
{{--        <div class="col-xs-6" style="line-height: 15px">--}}
{{--            f/<br>--}}
{{--            ______________________________________ <br>--}}
{{--            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;FIRMA DEL CLIENTE--}}
{{--        </div>--}}
    </div>
    <div class="row" style="margin-bottom: 15px!important;">
        <div class="col-xs-10" style="margin-left: 20px; margin-top:40px; text-align: justify; font-size: 10px">
            <p>

            </p>
        </div>
    </div>
</footer>
</body>
</html>
