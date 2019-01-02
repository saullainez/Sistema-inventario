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

Route::get('/identificacion', function(){
    return csrf_token();
});

Route::resource('presentacion', 'PresentacionController');
Route::resource('producto', 'ProductoController');
Route::resource('empresa', 'EmpresaController');
Route::get('/proveedor','EmpresaController@proveedores');
Route::get('clientes','EmpresaController@clientes');
Route::resource('movimientos', 'MovimientoConceptoController');
Route::get('/entradas','MovimientoConceptoController@entradas');
Route::get('/salidas','MovimientoConceptoController@salidas');