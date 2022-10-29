@extends('plantilla')

@section('contenido')

    <h2 class="text-center">REGISTRAR ORDEN DE ALQUILER</h2>
    <form id="form_general" autocomplete="off" action="{{route("orden_trabajo.store")}}" method="post">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-3">
                <div>
                    <label>Vehiculos Disponibles:</label>
                    <a title="Nuevo Vehiculo" href="{{route("vehiculos.created")}}">
                        <i class="fas fa-plus-circle "></i>
                    </a>
                </div>

                <select  v-model="vehiculo.vehiculo" required name="vehiculo" class="selectpicker"
                        data-none-Results-Text="No se encontro el vehiculo"
                        data-none-Selected-Text="Escoja una marca" data-live-search="true">
                    <option value="" hidden>Selecciona un vehiculo</option>
                    @foreach($vehiculos as $v)
                        <option value="{{$v->id}}">{{$v->marca->marca}} {{$v->linea->linea}} - {{$v->modelo}} - {{$v->color}} - {{$v->tipo_vehiculo->descripcion}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Fecha Inicial:</label>
                <input required name="fecha_recepcion" v-model="vehiculo.fechaInicial" type="date" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label>Fecha Final:</label>
                <input required name="fecha_recepcion" v-model="vehiculo.fechaFinal" type="date" class="form-control">
            </div>
            <br>
            <h2 class=" form-group col-md-12 text-center">FICHA CLIENTE</h2>

            <div class="form-group col-md-2 col-sm-6">
                <label>Nit:</label>
                <input id="nit" v-on:keyup.enter="buscarCliente" v-model="cliente.nit" required name="nit" type="text" class="form-control">
            </div>
            <div class="form-group col-md-3 col-sm-6">
                <label>Nombre Completo:</label>
                <input maxlength="60"  id="cliente" v-model="cliente.nombre" required name="nombre" type="text" class="form-control">
            </div>
            <div class="form-group col-md-3 col-sm-6">
                <label>Dirección:</label>
                <input maxlength="60" id="direccion" v-model="cliente.direccion" required name="direccion" type="text" class="form-control">
            </div>
            <div class="form-group col-md-2 col-sm-6">
                <label>Teléfono:</label>
                <input maxlength="8" id="telefono" type="number" maxlength="8" required v-model="cliente.telefono" name="telefono" class="form-control">
            </div>
            <div class="form-group col-md-2 col-sm-6">
                <label>Correo:</label>
                <input maxlength="45"  id="correo" name="correo" v-model="cliente.correo" type="email" class="form-control">
            </div>
        </div>
        <br>
        <h2 class="text-center">SERVICIOS SOLICITADOS</h2>


        {{--        <div  class=" d-flex mt-4 justify-content-center">--}}
        {{--            <button type="submit" class="btn btn-primary">Registrar</button>--}}
        {{--        </div>--}}
    </form>
    <form autocomplete="off" action="POST" id="ingreso">
        <div class="form-row">
            <div class="form-group col-md-4 ">

                <select v-model="addServicio.servicio" id="servicio" required name="servicio" class="form-control"
                        aria-label="Default select example">
                    <option value="" hidden>Selecciona un servicio</option>
                    <option v-for="item in servicios" v-bind:value="{ id: item.id, servicio: item.servicio }">@{{
                        item.servicio }}
                    </option>
                </select>
            </div>
            <div class="col-md-4 col-4">
                <input v-model="addServicio.observaciones" type="text" maxlength="250" id="observaciones"
                       class="form-control" placeholder="Observaciones">
            </div>
            <div class="col-md-2 col-4">
                <div class=" input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Q</div>
                    </div>
                    <input v-model="addServicio.precio" type="text" class="form-control" id="precio"
                           placeholder="Precio">
                </div>
            </div>
            <div class="col-md-2 col-4 form-group">
                <a v-on:click="agregarServicio" class="btn btn-primary"> Agregar Servicio</a>
            </div>
        </div>
    </form>
    <form id="form_servicios">
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th>Servicio</th>
                <th>Observaciones</th>
                <th>Precio</th>
            </tr>
            </thead>
            <tbody>
            @foreach($servicios as $servicio)
                @if($servicio->id == 5)
                    <tr>
                        <td>
                            {{$servicio->servicio}}
                        </td>
                        <td>
                            @{{ vehiculo.observacionesAlquiler }}
                        </td>
                        <td>
                            Q. @{{ vehiculo.alquilerTotal }}
                        </td>
                    </tr>
                @endif
            @endforeach
            <tr v-for="item in serviciosAgregados" v-if="serviciosAgregados !== null">
                <td>@{{item.servicio.servicio}}</td>
                <td>@{{item.observaciones}}</td>
                <td>Q. @{{item.precio}}</td>
            </tr>
            </tbody>
        </table>
    </form>
    <form id="registrar_ot">
        <div class=" d-flex mt-4 justify-content-center">
            <a href="#" id="btnRegistrarOrden" v-on:click="guardarOrden" class="btn btn-primary">Registrar</a>
        </div>
    </form>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var cliente = $('#cliente');

        cliente.autocomplete({
                source: function (request, response) {
                    var query = cliente.val();
                    $.ajax({
                        url: '{{route('cliente.buscar')}}',
                        method: 'POST',
                        data: {query: query},
                        success: function (data) {
                            let resp = $.map(data, function (obj, key) {
                                return {
                                    label: obj.nombre,
                                    value: obj.id,
                                    direccion: obj.direccion,
                                    telefono: obj.telefono,
                                    nit: obj.nit,
                                    correo: obj.correo,
                                }

                                //return obj.nombre;
                            });
                            response(resp);
                        }
                    })
                },
                focus: function (event, ui) {
                    event.preventDefault();
                },
                select: function (event, ui) {
                    event.preventDefault();
                    $('#cliente').val(ui.item.label);
                    $('#direccion').val(ui.item.direccion);
                    $('#telefono').val(ui.item.telefono);
                    $('#nit').val(ui.item.nit);
                    $('#correo').val(ui.item.correo);
                },
                minLength: 2
            }
        );
    </script>

    <script>
        new Vue({
            el: '#app',
            created() {
                this.getServicios()
            },
            data: {
                servicios: [],
                serviciosAgregados: [],

                addServicio: {
                    servicio: [],
                    observaciones: '',
                    precio: ''
                },

                addServicioDefault: {
                    servicio: [],
                    observaciones: '',
                    precio: ''
                },
                vehiculo: {
                    placa: '',
                    modelo: '',
                    color: '',
                    marca: '',
                    linea: '',
                    tipoVehiculo: '',
                    fechaInicial: '',
                    fechaFinal: '',
                    alquilerTotal: '',
                    observacionesAlquiler: '',
                },
                cliente: {
                  nombre: '',
                  nit: '',
                  telefono: '',
                  direccion: '',
                  correo: ''
                }
            },
            watch: {
                "vehiculo.fechaInicial": function(){
                    if(this.vehiculo.fechaFinal !== ''){
                        let dias = this.getDiffDays()
                        this.vehiculo.alquilerTotal = dias * 250
                        this.vehiculo.observacionesAlquiler = 'Renta por ' + dias + ' dias'
                    }
                },
                "vehiculo.fechaFinal": function(){
                    if(this.vehiculo.fechaInicial !== ''){
                        let dias = this.getDiffDays()
                        this.vehiculo.alquilerTotal = dias * 250
                        this.vehiculo.observacionesAlquiler = 'Renta por ' + dias + ' dias'
                    }
                },
            },
            methods: {
                getDiffDays: function() {
                    const start = moment(this.vehiculo.fechaInicial);
                    const end = moment(this.vehiculo.fechaFinal);
                    const diff = end.diff(start, "days")
                    return diff
                },
                getServicios: function () {
                    axios
                        .get('/api/servicios')
                        .then(response => {
                            this.servicios = response.data
                        })
                },
                buscarCliente: function () {
                    axios
                        .post('/buscar_clientes', {nit: this.cliente.nit})
                        .then(response => {
                            if (response.data !== '') {
                                this.cliente = response.data
                            } else {
                                this.cliente.nombre = ''
                                this.cliente.direccion = ''
                                this.cliente.correo = ''
                                this.cliente.telefono = ''
                            }
                        })
                },
                guardarOrden: function () {
                    if (this.serviciosAgregados.length!==0) {//que no sea igual a cero
                        document.getElementById("btnRegistrarOrden").disabled = true;
                        axios
                            .post('/guardar_ordenestrabajos', {
                                servicios: this.serviciosAgregados, cliente: this.cliente, vehiculo: this.vehiculo
                            })
                            .then(response => {
                                toastr.success('Ficha registrada con exito.')
                                setTimeout(function () {
                                    location.reload()

                                }, 3000)

                            })
                    }else{
                        toastr.error('No se rellenaron los campos.')
                    }
                },

                    agregarServicio: function () {
                        if (this.addServicio.servicio == '' || this.addServicio.precio == '') {
                            toastr.error('No se rellenaron los campos.')
                        } else {
                            let copyService = Object.assign({}, this.addServicio)
                            this.serviciosAgregados.push(copyService)
                            this.addServicio = Object.assign({}, this.addServicioDefault)
                            toastr.success('Se añadio el servicio!')
                        }
                    }

            }
        })
    </script>
    <style>
        .btn-blanco{
            background-color: #ffffff !important;
            border-color: #797e87 !important;
        }
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection
