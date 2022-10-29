@extends('plantilla')

@section('contenido')
    <h1>Tipos de Vehiculos</h1>
    <a class="btn btn-primary" href="{{route('tipos_vehiculos.created')}}">
        <i class="fas fa-plus-circle"></i>
         Nuevo Tipo de Vehiculo</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Descripcion</th>

        </tr>
        </thead>
        <tbody>
        @foreach($TiposVehiculos as $TipoVehiculo)
            <tr>
                <th scope="row">{{$TipoVehiculo->id}}</th>
                <td>{{$TipoVehiculo->descripcion}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
