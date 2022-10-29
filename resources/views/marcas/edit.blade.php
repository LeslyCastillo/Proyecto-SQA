@extends('plantilla')

@section('contenido')
    <h1 class="text-center">EDITAR MARCAS</h1>
    @if(session('usuarioGuardado'))
        <div class="alert alert-success">
            {{ session('usuarioGuardado') }}
        </div>
    @endif

    <form autocomplete="off" action="{{route("marcas.updated", $marca->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input name="marca" type="text" class="form-control">
        </div>

        <div  class=" d-flex mt-4 justify-content-center">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>

@endsection
