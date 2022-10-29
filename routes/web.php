<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
//Servicios
Route::get('/servicios', [\App\Http\Controllers\ServiciosController::class, 'index'])->name('servicios.index');
Route::get('/crear_servicios',[\App\Http\Controllers\ServiciosController::class, 'created'])->name("servicios.created");
Route::post("/guardar_servicios", [\App\Http\Controllers\ServiciosController::class, 'store'])->name("servicios.store");
route::delete("/delete/{id}",[\App\Http\Controllers\ServiciosController::class, 'delete'])->name('delete');
Route::get("/servicios/{id}/edit",  [\App\Http\Controllers\ServiciosController::class, 'edit'])->name("servicios.edit");
Route::post("/servicios/{id}/updated", [\App\Http\Controllers\ServiciosController::class, 'updated'])->name("servicios.updated");
Route::get('/api/servicios', [\App\Http\Controllers\ServiciosController::class, 'all']);
route::get('/reportes/vehiculos/{placa}',[\App\Http\Controllers\ReporteController::class,'vehiculos'])->name("reportes.vehiculos");
route::get('/servicios/periodo', [\App\Http\Controllers\ReporteController::class, 'periodo'])->name("reportes.periodo");

//Clientes
Route::get("/clientes", [\App\Http\Controllers\ClientesController::class, 'index'])->name("clientes.index");
Route::get('/crear_clientes',[\App\Http\Controllers\ClientesController::class, 'created'])->name("clientes.created");
Route::post("/guardar_clientes", [\App\Http\Controllers\ClientesController::class, 'store'])->name("clientes.store");
route::delete("/delete/{id}",[\App\Http\Controllers\ClientesController::class, 'delete'])->name('delete');
Route::post("/buscar_clientes", [\App\Http\Controllers\ClientesController::class, 'find'])->name("cliente.buscar");
Route::get("/clientes/{id}/edit",  [\App\Http\Controllers\ClientesController::class, 'edit'])->name("clientes.edit");
Route::post("/clientes/{id}/updated", [\App\Http\Controllers\ClientesController::class, 'updated'])->name("clientes.updated");
route::get('/reportes/clientes/{nit}',[\App\Http\Controllers\ReporteController::class,'clientes'])->name("reportes.clientes");


//vehiculos
Route::get("/vehiculos", [\App\Http\Controllers\VehiculosController::class, 'index'])->name("vehiculos.index");
Route::get('/crear_vehiculos',[\App\Http\Controllers\VehiculosController::class, 'created'])->name("vehiculos.created");
Route::post("/guardar_vehiculos", [\App\Http\Controllers\VehiculosController::class, 'store'])->name("vehiculos.store");
//lineas
Route::get("/lineas", [\App\Http\Controllers\LineasController::class, 'index'])->name("lineas.index");
Route::get('/crear_lineas',[\App\Http\Controllers\LineasController::class, 'created'])->name("lineas.created");
Route::post("/guardar_lineas", [\App\Http\Controllers\LineasController::class, 'store'])->name("lineas.store");
Route::post("/buscar_lineas", [\App\Http\Controllers\LineasController::class, 'find'])->name("linea.buscar");
Route::get("/lineas/{id}/edit",  [\App\Http\Controllers\LineasController::class, 'edit'])->name("lineas.edit");
Route::post("/lineas/{id}/updated", [\App\Http\Controllers\LineasController::class, 'updated'])->name("lineas.updated");



//marcas
Route::get("/marcas", [\App\Http\Controllers\MarcasController::class, 'index'])->name("marcas.index");
Route::get('/crear_marcas',[\App\Http\Controllers\MarcasController::class, 'created'])->name("marcas.created");
Route::post("/guardar_marcas", [\App\Http\Controllers\MarcasController::class, 'store'])->name("marcas.store");
Route::post("/buscar_marcas", [\App\Http\Controllers\MarcasController::class, 'find'])->name("marca.buscar");
Route::get("/marcas/{id}/edit",  [\App\Http\Controllers\MarcasController::class, 'edit'])->name("marcas.edit");
Route::post("/marcas/{id}/updated", [\App\Http\Controllers\MarcasController::class, 'updated'])->name("marcas.updated");


//Ordenes de trabajo
Route::get("/ordenestrabajos",[\App\Http\Controllers\OrdenesTrabajosController::class, 'index'])->name("orden_trabajo.index");
Route::get('/crear_ordenestrabajos',[\App\Http\Controllers\OrdenesTrabajosController::class, 'created'])->name("orden_trabajo.created");
Route::post("/guardar_ordenestrabajos", [\App\Http\Controllers\OrdenesTrabajosController::class, 'store'])->name("orden_trabajo.store");

Route::post("/cambiar_estado", [\App\Http\Controllers\OrdenesTrabajosController::class, 'estado'])->name("orden_trabajo.estado");
//Pagos
Route::get("/pagos", [\App\Http\Controllers\PagosController::class, 'index'])->name("pagos.index");
Route::get('/crear_pagos',[\App\Http\Controllers\PagosController::class, 'created'])->name("pagos.created");
Route::post("/realizar_pago", [\App\Http\Controllers\PagosController::class, 'store'])->name("pagos.store");


//tipos de vehiculos
Route::get("/tiposvehiculos",[\App\Http\Controllers\TiposVehiculosController::class,'index'])->name("tipos_vehiculos.index");
Route::get('/crear_tiposvehiculos',[\App\Http\Controllers\TiposVehiculosController::class, 'created'])->name("tipos_vehiculos.created");
Route::post("/guardar_tiposvehiculos", [\App\Http\Controllers\TiposVehiculosController::class, 'store'])->name("tipos_vehiculos.store");
//tipos de pago
Route::get("/tipospagos",[\App\Http\Controllers\TiposPagosController::class,'index'])->name("tipos_pagos.index");
Route::get('/crear_tipospagos',[\App\Http\Controllers\TiposPagosController::class, 'created'])->name("tipos_pagos.created");
Route::post("/guardar_tipospagos", [\App\Http\Controllers\TiposPagosController::class, 'store'])->name("tipos_pagos.store");

//pdf
Route::get("/orden_trabajo/{id}",[\App\Http\Controllers\PdfController::class,'streamPDF'])->name("orden.pdf");
Route::get("/comprobante/{id}",[\App\Http\Controllers\PdfController::class,'streamComprobantePDF'])->name("comprobante.pdf");



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
