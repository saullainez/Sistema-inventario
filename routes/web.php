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
Route::put('/actualizartipobebida', 'TipoBebidaController@actualizarTipoBebida');
Route::delete('/eliminartipobebida', 'TipoBebidaController@eliminarTipoBebida');

Route::get('/obteneractivos', 'ActivoController@obtenerActivos');
Route::put('/actualizaractivo', 'ActivoController@actualizarActivo');
Route::delete('/eliminaractivo', 'ActivoController@eliminarActivo');

Route::get('/obtenerempresas', 'EmpresaController@obtenerEmpresas');
Route::put('/actualizarempresa', 'EmpresaController@actualizarEmpresa');
Route::delete('/eliminarempresa', 'EmpresaController@eliminarEmpresa');

Route::get('/obtenerproductos', 'ProductoController@obtenerProductos');
Route::put('/actualizarproducto', 'ProductoController@actualizarProducto');
Route::delete('/eliminarproducto', 'ProductoController@eliminarProducto');

Route::get('/obtenerpresentaciones', 'PresentacionController@obtenerPresentaciones');
Route::put('/actualizarpresentacion', 'PresentacionController@actualizarPresentacion');
Route::delete('/eliminarpresentacion', 'PresentacionController@eliminarPresentacion');



Route::get('/obtenerinventarios','InventarioController@obtenerInventario');
Route::put('/actualizarinventario','InventarioController@actualizarInventario');
Route::delete('/eliminarinventario','InventarioController@eliminarInventario');

Route::get('/obtenerinventarioactivos','InventarioActivoController@obtenerInventarioActivo');
Route::put('/actualizarinventarioactivo','InventarioActivoController@actualizarInventarioActivo');
Route::delete('/eliminarinventarioactivo','InventarioActivoController@eliminarInventarioActivo');

Route::get('/obtenermovimientoconceptos','MovimientoConceptoController@obtenerMovimientoConcepto');
Route::put('/actualizarmovimientocontepto','MovimientoConceptoController@actualizarMovimientoConcepto');
Route::delete('/eliminarmovimientoconcepto','MovimientoConceptoController@eliminarMovimientoConcepto');

Route::get('/obtenermovimientoactivos','MovimientoActivoController@obtenerMovimientoActivo');
Route::put('/actualizarmovimientoactivo','MovimientoActivoController@actualizarMovimientoActivo');
Route::delete('/eliminarmovimientoactivo','MovimientoActivoController@eliminarMovimientoActivo');

Route::get('/obtenermovimientoproductos','MovimientoProductoController@obtenerMovimientoProducto');
Route::put('/actualizarmovimientoproducto','MovimientoProductoController@actualizarMovimientoProducto');
Route::delete('/eliminarmovimientoproducto','MovimientoProductoController@eliminarMovimientoProducto');

Route::get('/identificacion', function(){
    return csrf_token();
});

Route::get('/movimientos', 'movimientosController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//rutas para reportes

Route::get('/reporte-inventario','reportes\repInvController@totalInventario');
/*
Route::get('/reporte-inventario/entradas-salidas/{fechaInicio}/{fechaFin}',function($fecha1,$fecha2){
    dd($fecha1);
});
*/
Route::get('/reporte-inventario/entradas-salidas/{fechaInicio}/{fechaFin}/{impuesto}','reportes\repInvController@compraVentaInv');
Route::get('/reporte-inventario/proveedores/{fechaInicio}/{fechaFin}','reportes\repInvController@mejorProveedor');

Route::get('/reporte-producto','reportes\repInvPresController@inventarioPresentacion');

Route::get('/reporte-producto/entradas-salidas/{fechaInicio}/{fechafin}/{impuesto}','reportes\repInvPresController@movimientosProducto');
Route::get('reporte-producto/clientes/{fechaInicio}/{fechafin}','reportes/repInvPresController@mejorCliente');