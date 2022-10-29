@extends('plantilla')

@section('contenido')
    <h1>Tipos de vehiculos</h1>

    <form action="{{route("tipos_vehiculos.store")}}" method="post">
        @csrf
        <div class="form-group">
            <label>Descripcion</label>
            <input name="descripcion" type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

@endsection
