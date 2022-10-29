@extends('plantilla')

@section('contenido')
    <h1 class="text-center">REGISTRAR MARCA</h1>

    <form action="{{route("marcas.store")}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input name="marca" type="text" class="form-control">
        </div>

        <div  class=" d-flex mt-4 justify-content-center">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>

@endsection
