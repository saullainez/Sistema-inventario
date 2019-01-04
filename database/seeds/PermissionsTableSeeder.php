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
        
    }
}
