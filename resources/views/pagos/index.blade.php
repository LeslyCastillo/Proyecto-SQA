@extends('plantilla')

@section('contenido')
    <h1 class="text-center">PAGOS</h1>
{{--    <div  class="d-flex justify-content-end">--}}
{{--        <a class="btn btn-success" href="{{route('pagos.created')}}">--}}
{{--            <i class="fas fa-plus-circle"></i>--}}
{{--            Nuevo Pago</a>--}}
{{--    </div>--}}

        <br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Fecha de pago</th>
            <th scope="col">Nit</th>
            <th scope="col">Cliente</th>
            <th scope="col" class="text-center">Ficha Alquiler</th>
            <th scope="col">Total</th>
            <th scope="col" class="text-center">Forma de Pago</th>
            <th scope="col" class="text-center">Comprobante</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pagos as $pago)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{date_format(date_create($pago->fecha), 'd-m-Y')}}</td>
                <td>{{$pago->nit}}</td>
                <td>{{$pago->nombre}}</td>
                <td class="text-center">#{{$pago->orden_de_trabajo_id}}</td>
                <td>Q{{number_format($pago->total,2)}}</td>
                <td class="text-center">
                    @if($pago->tipo_de_pago==1)
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
                        Generico
                        @endif
                </td>
                <td class="text-center"> <form>
                        {{--                        @csrf @method('DELETE')--}}
                        <a href="{{route('comprobante.pdf', $pago->id)}}" target="_blank" class="btn btn-outline-info btn-sm ">
                            <i class=" far fa-eye"> </i>
                            VER</a>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
