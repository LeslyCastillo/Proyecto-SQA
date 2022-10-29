@extends('plantilla')

@section('contenido')
    <h1 class="text-center">VEHICULOS</h1>
    <br>
    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-primary"  style=background-color:forestgreen href="{{route('vehiculos.created')}}">
                <i class="fas fa-plus-circle"></i>
                Crear vehiculo</a>
        </div>
        <div class="col-md-8">
            <form class="mr-auto" action="{{route('vehiculos.index')}}">
                <div class="form-group">
                    <input name="placa" type="text" class="form-control" placeholder="Buscar por placa">
                </div>
            </form>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Placa</th>
            <th scope="col">Modelo</th>
            <th scope="col">Color</th>
            <th scope="col">Línea</th>
            <th scope="col">Marca</th>
            <th scope="col">Tipo</th>
            <th scope="col">Estado</th>
            <th scope="col">Historial de Servicios</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vehiculos as $vehiculo)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$vehiculo->placa}}</td>
                <td>{{$vehiculo->modelo}}</td>
                <td>{{$vehiculo->color}}</td>
                <td>{{$vehiculo->linea}}</td>
                <td>{{$vehiculo->marca}}</td>
                <td class="text-center">{{$vehiculo->descripcion}}</td>
                <td class="text-center">{{$vehiculo->estado}}</td>

                <td class="text-center"> <form>
                        {{--                        @csrf @method('DELETE')--}}
                        <a href="{{route('reportes.vehiculos', $vehiculo->placa)}}" class="btn btn-outline-info btn-sm ">
                            <i class=" far fa-eye"> </i>
                            VER</a>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
