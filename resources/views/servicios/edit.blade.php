@extends('plantilla')

@section('contenido')
    <h1 class="text-center"> EDITAR SERVICIO </h1>

    <form autocomplete="off" action="{{route("servicios.updated", $servicio->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label>Descripción del Servicio:</label>
            <input name="servicio" type="text" class="form-control">

        </div>

{{--        <div class="form-group">--}}
{{--            <label>Precio:</label>--}}
{{--            <input name="precio" type="text" class="form-control">--}}

{{--        </div>--}}

        <div  class=" d-flex mt-4 justify-content-center">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>
    </form>

@endsection
