<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permisos de usuarios
        Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'usuarios.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear usuarios',
            'slug'          => 'usuarios.create',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'usuarios.edit',
            'description'   => 'Editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'usuarios.destroy',
            'description'   => 'Elimina cualquier usuario del sistema',
        ]);
        //Roles
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear roles',
            'slug'          => 'roles.create',
            'description'   => 'Crear rol',
        ]);
        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Editar cualquier rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar rol',
            'slug'          => 'roles.destroy',
            'description'   => 'Elimina cualquier rol del sistema',
        ]);
        //Permisos
        Permission::create([
            'name'          => 'Navegar permisos',
            'slug'          => 'permisos.index',
            'description'   => 'Lista y navega todos los permisos del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear permisos',
            'slug'          => 'permisos.create',
            'description'   => 'Crear permiso',
        ]);
        Permission::create([
            'name'          => 'Edición de permisos',
            'slug'          => 'permisos.edit',
            'description'   => 'Editar cualquier permiso del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar permiso',
            'slug'          => 'permisos.destroy',
            'description'   => 'Elimina cualquier permiso del sistema',
        ]);
        //Tipo-bebida
        Permission::create([
            'name'          => 'Navegar tipos de bebida',
            'slug'          => 'tipo-bebida.index',
            'description'   => 'Lista y navega todos los tipo de bebida del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear tipo de bebida',
            'slug'          => 'tipo-bebida.create',
            'description'   => 'Crear tipo de bebida',
        ]);
        Permission::create([
            'name'          => 'Edición de tipo de bebida',
            'slug'          => 'tipo-bebida.edit',
            'description'   => 'Editar cualquier tipo de bebida del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar tipo de bebida',
            'slug'          => 'tipo-bebida.destroy',
            'description'   => 'Elimina cualquier tipo de bebida del sistema',
        ]);
        //Activos
        Permission::create([
            'name'          => 'Navegar activos',
            'slug'          => 'activo.index',
            'description'   => 'Lista y navega todos los activos del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear activos',
            'slug'          => 'activo.create',
            'description'   => 'Crear activo',
        ]);
        Permission::create([
            'name'          => 'Edición de activos',
            'slug'          => 'activo.edit',
            'description'   => 'Editar cualquier activo del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar activo',
            'slug'          => 'activo.destroy',
            'description'   => 'Elimina cualquier activo del sistema',
        ]);
        //Empresas
        Permission::create([
            'name'          => 'Navegar Empresas',
            'slug'          => 'empresa.index',
            'description'   => 'Lista y navega todas los Empresas del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear Empresas',
            'slug'          => 'empresa.create',
            'description'   => 'Crear empresa',
        ]);
        Permission::create([
            'name'          => 'Edición de Empresas',
            'slug'          => 'empresa.edit',
            'description'   => 'Editar cualquier empresa del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar empresa',
            'slug'          => 'empresa.destroy',
            'description'   => 'Elimina cualquier empresa del sistema',
        ]);
        //Productos
        Permission::create([
            'name'          => 'Navegar Productos',
            'slug'          => 'producto.index',
            'description'   => 'Lista y navega todos los Productos del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear Productos',
            'slug'          => 'producto.create',
            'description'   => 'Crear producto',
        ]);
        Permission::create([
            'name'          => 'Edición de Productos',
            'slug'          => 'producto.edit',
            'description'   => 'Editar cualquier producto del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar producto',
            'slug'          => 'producto.destroy',
            'description'   => 'Elimina cualquier producto del sistema',
        ]);
        //Presentaciones
        Permission::create([
            'name'          => 'Navegar Presentaciones',
            'slug'          => 'presentacion.index',
            'description'   => 'Lista y navega todas las Presentaciones del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear Presentaciones',
            'slug'          => 'presentacion.create',
            'description'   => 'Crear presentacion',
        ]);
        Permission::create([
            'name'          => 'Edición de Presentaciones',
            'slug'          => 'presentacion.edit',
            'description'   => 'Editar cualquier presentacion del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar presentacion',
            'slug'          => 'presentacion.destroy',
            'description'   => 'Elimina cualquier presentacion del sistema',
        ]);
        //Movimiento concepto
        Permission::create([
            'name'          => 'Navegar Conceptos',
            'slug'          => 'movimiento-concepto.index',
            'description'   => 'Lista y navega todos los Conceptos del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear Conceptos',
            'slug'          => 'movimiento-concepto.create',
            'description'   => 'Crear concepto',
        ]);
        Permission::create([
            'name'          => 'Edición de Conceptos',
            'slug'          => 'movimiento-concepto.edit',
            'description'   => 'Editar cualquier concepto del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar Concepto',
            'slug'          => 'movimiento-concepto.destroy',
            'description'   => 'Elimina cualquier concepto del sistema',
        ]);
        //Movimiento activo
        Permission::create([
            'name'          => 'Navegar Movimientos de activos',
            'slug'          => 'movimiento-activo.index',
            'description'   => 'Lista y navega todos los Movimientos de activos del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear Movimientos de activos',
            'slug'          => 'movimiento-activo.create',
            'description'   => 'Crear movimiento de activo',
        ]);
        Permission::create([
            'name'          => 'Edición de Movimientos de activos',
            'slug'          => 'movimiento-activo.edit',
            'description'   => 'Editar cualquier movimiento de activo del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar Movimientos de activos',
            'slug'          => 'movimiento-activo.destroy',
            'description'   => 'Elimina cualquier movimiento de activo del sistema',
        ]);
        //Movimiento productos
        Permission::create([
            'name'          => 'Navegar Movimientos de productos',
            'slug'          => 'movimiento-producto.index',
            'description'   => 'Lista y navega todos los Movimientos de productos del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear Movimientos de productos',
            'slug'          => 'movimiento-producto.create',
            'description'   => 'Crear movimiento de producto',
        ]);
        Permission::create([
            'name'          => 'Edición de Movimientos de productos',
            'slug'          => 'movimiento-producto.edit',
            'description'   => 'Editar cualquier movimiento de producto del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar Movimientos de productos',
            'slug'          => 'movimiento-producto.destroy',
            'description'   => 'Elimina cualquier movimiento de producto del sistema',
        ]);
        Permission::create([
            'name'          => 'Mirar vista de reportes',
            'slug'          => 'reportes.index',
            'description'   => 'Muestra la vista de reportes',
        ]);
        Permission::create([
            'name'          => 'Mirar inventario de materia prima',
            'slug'          => 'reporte-inventario.totalinventario',
            'description'   => 'Muestra un reporte con el inventario de la materia prima',
        ]);
        Permission::create([
            'name'          => 'Mirar reporte de compra y venta',
            'slug'          => 'reporte-inventario.compraventainventario',
            'description'   => 'Muestra un reporte de compras y ventas',
        ]);
        Permission::create([
            'name'          => 'Mirar reporte de mejor proveedor',
            'slug'          => 'reporte-inventario.mejorproveedor',
            'description'   => 'Muestra un reporte de mejor proveedor',
        ]);
        Permission::create([
            'name'          => 'Mirar reporte de productos',
            'slug'          => 'reporte-producto.inventariopresentacion',
            'description'   => 'Muestra un reporte con el inventario de productos',
        ]);
        Permission::create([
            'name'          => 'Mirar reporte de movimientos de productos',
            'slug'          => 'reporte-producto.movimientosproducto',
            'description'   => 'Muestra un reporte con los movimientos de productos',
        ]);
        Permission::create([
            'name'          => 'Mirar reporte de mejor cliente',
            'slug'          => 'reporte-producto.mejorcliente',
            'description'   => 'Muestra un reporte de mejor cliente',
        ]);
        
    }
}
