@extends('plantilla')

@section('contenido')
    <h1 class="text-center"> HISTORIAL DE SERVICIOS SEGÚN PERÍODO</h1>
    <br>
    {{--    <a class="btn btn-primary"  style=background-color:forestgreen href="{{route('vehiculos.created')}}">--}}
    {{--        <i class="fas fa-plus-circle"></i>--}}
    {{--         Crear vehiculo</a>--}}
<form method="get" action="{{route('reportes.periodo')}}">
    <div class="row">
        <div class="col-md-5">

    <div class="form-group mb-2">
        <label>Fecha Inicio</label>
        <input value="{{$start}}" type="date" name="start" class="form-control" id="start" >
    </div>
        </div>
        <div class="col-md-5">

    <div class="form-group mb-2">
        <label >Fecha Final</label>
        <input value="{{$end}}" type="date" name="end" class="form-control" id="end">
    </div>
        </div>
        <div class="col-md-2">
    <button type="submit" class="btn btn-primary mt-4">Buscar</button>
        </div>
    </div>
</form>
    @isset($vehiculos)

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Fecha</th>
            <th scope="col">Nit</th>
            <th scope="col">Cliente</th>
            <th scope="col">Placa</th>
            <th scope="col">Servicio</th>
            <th scope="col">Precio</th>
            <TH scope="col" class="text-center">Ficha Alquiler</TH>

        </tr>
        </thead>
        <tbody>
        @foreach($vehiculos as $vehiculo)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{\Carbon\Carbon::create($vehiculo->created_at)->format('d-m-Y')}}</td>
                <td>{{$vehiculo->nit}}</td>
                <td>{{$vehiculo->nombre}}</td>
                <td>{{$vehiculo->placa}}</td>
                <td>{{$vehiculo->servicio}}</td>
                <td>{{$vehiculo->total}}</td>
                <td class="text-center"> <form>
                        {{--                        @csrf @method('DELETE')--}}
                        <a href="{{route('orden.pdf', $vehiculo->no_orden)}}" target="_blank" class="btn btn-outline-info btn-sm ">
                            <i class=" far fa-eye"> </i>
                            VER</a>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endisset
@endsection
