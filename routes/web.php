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
Route::resource('movimiento-concepto', 'MovimientoConceptoController');
Route::resource('movimiento-producto', 'MovimientoProductoController');
Route::resource('movimiento-activo', 'MovimientoActivoController');
Route::resource('activo', 'ActivoController');
Route::resource('inventario', 'InventarioController');
Route::resource('inventario-activo', 'InventarioActivoController');
Route::resource('usuarios', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permisos', 'PermisosController');

Route::get('/proveedor','EmpresaController@proveedores');
Route::get('/clientes','EmpresaController@clientes');
Route::get('/entradas','MovimientoConceptoController@entradas');
Route::get('/salidas','MovimientoConceptoController@salidas');

Route::get('/obtenerusuarios', 'UserController@obtenerUsuarios');
Route::put('/actualizarusuario', 'UserController@actualizarUsuario');
Route::delete('/eliminarusuario', 'UserController@eliminarUsuario');
Route::post('/agregarrolusuario', 'UserController@agregarRolUsuario');
Route::get('/obtenerrolsusuario', 'UserController@verRolUsuario');

Route::get('/obtenerroles', 'RoleController@obtenerRoles');
Route::put('/actualizarrol', 'RoleController@actualizarRol');
Route::delete('/eliminarrol', 'RoleController@eliminarRol');
Route::post('/agregarpermisorol', 'RoleController@agregarPermisoRol');
Route::get('/obtenerpermisorol', 'RoleController@verPermisoRol');

Route::get('/obtenerpermisos', 'PermisosController@obtenerPermisos');
Route::put('/actualizarpermiso', 'PermisosController@actualizarPermiso');
Route::delete('/eliminarpermiso', 'PermisosController@eliminarPermiso');

Route::get('/obtenertipobebida', 'TipoBebidaController@obtenerTipoBebida');

Route::get('/identificacion', function(){
    return csrf_token();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
