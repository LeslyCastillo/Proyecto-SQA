<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>RENTALQ - SQA - {{$orden->id}}</title>
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
    .page_break { page-break-before: always; }

</style>
<body>
<div class="row">
    <div class="col-xs-2">
        <img src="https://i.imgur.com/nuv6URk.png" style="height: 80px; width: 100%; margin-top: 5px; line-height: 5px;margin-bottom: 0;" />
    </div>
    <div class="col-xs-4">
        <p>
            <h4>FICHA ALQUILER</h4>
            Ruta Principal <br>
            Puerto Barrios, Izabal, Guatemala <br>
            Tel.: 1234-5678 - Fax: 5267-5638
        </p>
    </div>
    <div class="col-xs-4">
        <div>
            Fecha De Inicio {{\Carbon\Carbon::create($orden->fecha_inicio)->format('d-m-Y')}} <br>
            Fecha Final Alquiler {{\Carbon\Carbon::create($orden->fecha_final)->format('d-m-Y')}}

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
        <th colspan="6" class="text-center" style=" background: #DCD0FF; ">DATOS DEL VEHICULO</th>
    </tr>
    <tr>
        <td class="text-center" scope="row"><b>PLACA:</b> <br> {{$orden->placa}}</td>
        <td class="text-center" scope="row"><b>MARCA:</b> <br> {{$orden->marca}}</td>
        <td class="text-center"><b>LÍNEA:</b> <br> {{$orden->linea}}</td>
        <td class="text-center"><b>MODELO:</b> <br> {{$orden->modelo}}</td>
        <td class="text-center"><b>COLOR:</b> <br> {{$orden->color}}</td>
        <td class="text-center"><b>TIPO DE VEHICULO:</b> <br> {{$orden->descripcion}}</td>
    </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <tbody>
    <tr>
        <th colspan="5" class="text-center" style=" background: #DCD0FF; ">DATOS DEL CLIENTE</th>
    </tr>
    <tr>
        <td class="text-center"><b>NOMBRE:</b> <br> {{$orden->nombre}}</td>
        <td class="text-center"><b>NIT:</b> <br> {{$orden->nit}}</td>
        <td class="text-center"><b>DIRECCIÓN:</b> <br> {{$orden->direccion}}</td>
        <td class="text-center"><b>CORREO:</b> <br> {{$orden->correo}}</td>
        <td class="text-center"><b>TELÉFONO:</b> <br> {{$orden->telefono}}</td>
    </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <tbody>
    <tr>
        <th colspan="3" class="text-center" style=" background: #DCD0FF; ">SERVICIOS SOLICITADOS</th>
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
<div style="margin-top: 65px">
    <div class="row" style="margin-bottom: 25px!important;">
        <div class="col-xs-5" style="line-height: 15px">
            f/<br>
            ______________________________________ <br>
            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; FIRMA DE ENCARGADO
        </div>
        <div class="col-xs-6" style="line-height: 15px">
            f/<br>
            ______________________________________ <br>
            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;FIRMA DEL CLIENTE
        </div>
    </div>
    <div class="row" style="margin-bottom: 15px!important;">
        <div class="col-xs-10" style="margin-left: 20px; margin-top:40px; text-align: justify; font-size: 10px">
            <p>
                <b>CONDICIONES ACEPTADAS POR EL CLIENTE: </b>
                <br>
                <b>1.</b> Confirma que el vehículo es responsabilidad del cliente en cuanto a su integridad.
                <br>
                <b>2.</b> Ningún vehículo será aceptado en malas condiciones.
                <br>
                <b>3.</b> Todo daño ocasionado se tendra que contatar a la aseguranza que se tuvo que contratar.
            </p>
        </div>
    </div>
</div>
<div class="page_break"></div>
<img src="https://rentalq.autos/contrato.jpeg" style="height: 800px; width: 100%; margin-top: 5px; line-height: 5px;margin-bottom: 0;" />
<div class="page_break"></div>
<img src="https://rentalq.autos/inspeccion.jpeg" style="height: 950px; width: 110%; margin-top: 5px; line-height: 5px;margin-bottom: 0;" />
</body>
</html>
