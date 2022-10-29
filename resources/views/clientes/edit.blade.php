@extends('plantilla')

@section('contenido')
    <h1 class="text-center">EDITAR DATOS DEL CLIENTE</h1>
    @if(session('usuarioGuardado'))
        <div class="alert alert-success">
            {{ session('usuarioGuardado') }}
        </div>
    @endif

    <form autocomplete="off" action="{{route("clientes.updated", $cliente->id)}}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nombre:</label>
                <input value="{{$cliente->nombre}}" name="nombre" type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Nit:</label>
                <input value="{{$cliente->nit}}" name="nit" type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Teléfono:</label>
                <input value="{{$cliente->telefono}}" name="telefono" type="tel" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Dirección:</label>
                <input value="{{$cliente->direccion}}" name="direccion" type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Correo Electrónico:</label>
                <input value="{{$cliente->correo}}" name="correo" type="email" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>DPI:</label>
                <input  name="dpi" type="file" class="form-control">
            </div>
        </div>
        <div  class=" d-flex mt-4 justify-content-center">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>



@endsection
