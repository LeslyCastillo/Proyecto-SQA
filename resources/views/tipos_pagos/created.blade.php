@extends('plantilla')

@section('contenido')
    <h1>Tipos de Pago</h1>

    <form action="{{route("tipos_pagos.store")}}" method="post">
        @csrf
        <div class="form-group">
            <label>Forma de pago</label>
            <input name="forma_de_pago" type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

@endsection
