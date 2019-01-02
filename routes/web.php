<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', function(){
    return view('formulario');
});
Route::resource('tipo-bebida', 'TipoBebidaController');
Route::resource('presentacion', 'PresentacionController');
Route::resource('producto', 'ProductoController');
Route::resource('empresa', 'EmpresaController');
Route::resource('conceptos', 'MovimientoConceptoController');
Route::resource('movimiento-producto', 'MovimientoProductoController');
Route::resource('movimiento-activo', 'MovimientoActivoController');
Route::resource('activo', 'ActivoController');
Route::resource('inventario', 'InventarioController');
Route::resource('inventario-activo', 'InventarioActivoController');

Route::get('/proveedor','EmpresaController@proveedores');
Route::get('/clientes','EmpresaController@clientes');
Route::get('/entradas','MovimientoConceptoController@entradas');
Route::get('/salidas','MovimientoConceptoController@salidas');

Route::get('/identificacion', function(){
    return csrf_token();
});
