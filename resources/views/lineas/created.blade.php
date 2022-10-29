@extends('plantilla')

@section('contenido')
    <h1 class="text-center"> REGISTRAR LÍNEA</h1>

    <form autocomplete="off" action="{{route("lineas.store")}}" method="post">
        @csrf
        <div class="form-row">
        <div class="form-group col-md-6">
            <label>Línea</label>
            <input name="linea" type="text" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label>Marca</label>
            <select  name="marca" class="form-control" aria-label="Default select example">
                <option selected hidden>Selecciona una marca</option>
                @foreach($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->marca}}</option>
                @endforeach
            </select>
        </div>
        </div>

        <div  class=" d-flex mt-4 justify-content-center">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>

@endsection
