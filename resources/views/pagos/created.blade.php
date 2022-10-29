@extends('plantilla')

@section('contenido')
    <h1 class="text-center">PAGOS</h1>
    <br>
    <form action="{{route("pagos.store")}}" method="post">
        @csrf
        <div class="form-row">
        <div class="form-group col-md-2">
            <label>Fecha:</label>
            <input name="fecha" type="date" class="form-control">
        </div>
            <div class="form-group col-md-2">
                <label>Placa del Vehiculo:</label>
                <input name="placa" type="text" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label>Nit:</label>
                <input name="nit" type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Cliente:</label>
                <input name="cliente" type="text" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label> No. Ficha Alquiler:</label>
                <input name="orden_trabajo" type="text" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label> Total:</label>
                <input name="total" type="text" class="form-control">
            </div>
            <div class="form-group col-md-4">

                <div>
                    <label STYLE="margin-right: 265px;" >Formas de pago:</label>
                    <a title="NUEVA FORMA" href="{{route("tipos_pagos.created")}}" >
                        <i  class="fas fa-plus-circle "></i>
                    </a>
                </div>
                <select required name="tipopago" class="form-control" aria-label="Default select example">
                    <option value="" hidden>Selecciona una forma</option>
                    @foreach( $tipo_pago as $tipopago)
                        <option value="{{$tipopago->id}}">{{$tipopago->forma_de_pago}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div  class=" d-flex mt-4 justify-content-center ">
            <button type="submit" class="btn btn-default far fa-file-pdf ">Imprimir Recibo PDF</button>
        </div>
        <div  class=" d-flex mt-4 justify-content-center">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>

    </form>

@endsection
