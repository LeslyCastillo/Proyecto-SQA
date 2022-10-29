@extends('plantilla')

@section('contenido')
    <h1>Formas de Pagos</h1>
    <a class="btn btn-primary" href="{{route('tipos_pagos.created')}}">
        <i class="fas fa-plus-circle"></i>
         Nueva forma de pago</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Forma de Pago</th>

        </tr>
        </thead>
        <tbody>
        @foreach($TiposPagos as $TipoPago)
            <tr>
                <th scope="row">{{$TipoPago->id}}</th>
                <td>{{$TipoPago->forma_de_pago}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
