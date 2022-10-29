@extends('plantilla')

@section('contenido')
    <h1 class="text-center">LÍNEAS REGISTRADAS</h1>
    <div class="d-flex justify-content-end">
    <a class="btn btn-success" href="{{route('lineas.created')}}">
        <i class="fas fa-plus-circle"></i>
        Nueva Linea</a>
    </div>
    <br>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Línea</th>
            <th scope="col">Marca</th>
            <th scope="col" class="text-center">Acciones</th>

        </tr>
        </thead>
        <tbody>
        @foreach($lineas as $linea)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$linea->linea}}</td>
                <td>{{$linea->marca}}</td>
                <td  class="text-center">
                    {{--               <td> <form action="{{route('delete', $cliente->id)}}" method="post">--}}
                    {{--                    @csrf @method('DELETE')--}}
                    {{--                    <button title="ELIMINAR REGISTRO" type="submit" onclick="return confirm('¿Seguro de borrar datos?');" class="btn btn-danger btn-sm">--}}
                    {{--                        <i class="fas fa-trash-alt"></i>--}}
                    {{--                    </button>--}}
                    <a title="EDITAR DATOS" class="btn btn-primary btn-sm" href="{{route("lineas.edit", $linea->id)}}"><i class="fas fa-edit"></i>
                    </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
