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
        Permission::create([
            'name'          => 'Navegar usuario',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'description'   => 'Ver detalles de cada usuario del sistema',
        ]);
        Permission::create([
            'name'          => 'Edicion  de usuario',
            'slug'          => 'users.edit',
            'description'   => 'Editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'users.destroy',
            'description'   => 'Eliminar cualquier usuario del sistema',
        ]);
        //ROLES
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roless del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de rol',
            'slug'          => 'roles.show',
            'description'   => 'Ver detalles de cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'creacion  de roles',
            'slug'          => 'roles.create',
            'description'   => 'Editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Edicion  de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Eliminar cualquier rol del sistema',
        ]);

        //productos
        //ROLES
        Permission::create([
            'name'          => 'Navegar Productos',
            'slug'          => 'products.index',
            'description'   => 'Lista y navega todos los Productos del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de rol',
            'slug'          => 'products.show',
            'description'   => 'Ver detalles de cada Producto del sistema',
        ]);
        Permission::create([
            'name'          => 'creacion  de Productos',
            'slug'          => 'products.create',
            'description'   => 'Editar cualquier dato de un Producto del sistema',
        ]);
        Permission::create([
            'name'          => 'Edicion  de Productos',
            'slug'          => 'products.edit',
            'description'   => 'Editar cualquier dato de un Producto del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar Productos',
            'slug'          => 'products.destroy',
            'description'   => 'Eliminar cualquier Producto del sistema',
        ]); 
    }
}
