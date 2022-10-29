@extends('plantilla')

@section('contenido')
    <h1 class="text-center">SERVICIOS </h1>
    <div class="d-flex justify-content-end">
    <a class="btn btn-success" href="{{route('servicios.created')}}">
        <i class="fas fa-plus-circle"></i>
          Nuevo Servicio</a>
    </div>
    <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Descripción del Servicio</th>
                <th scope="col"  class="text-center">Acciones</th>

            </tr>
            </thead>
            <tbody>
            @foreach($servicios as $servicio)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$servicio->servicio}}</td>

                <td  class="text-center" >
                        <a title="EDITAR DATOS" class=" btn btn-primary btn-sm" href="{{route("servicios.edit", $servicio->id)}}"><i class="fas fa-edit"></i>
                        </a>
                    </form>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

@endsection
