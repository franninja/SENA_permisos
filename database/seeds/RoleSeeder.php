<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'empresas']);

        Permission::create(['name' => 'home',
                            'description' => 'ver el Dashboard'
                            ])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'user.index',
                            'description' => 'Ver lista de Usuarios'
                            ])->syncRoles([$role1]);
        Permission::create(['name' => 'user.role',
                            'description' => 'asignar rol'
                            ])->syncRoles([$role1]);
        Permission::create(['name' => 'user.saverole',
                            'description' => 'cambiar y/o guardar el rol de un usuario'
                            ])->syncRoles([$role1]);

        // permisos para la gestion de roles
        Permission::create(['name' => 'roles.index',
                            'description' => 'Ver lista de Roles'
                            ])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create',
                            'description' => 'Crear nuevos Roles'
                            ])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit',
                            'description' => 'Editar roles'
                            ])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy',
                            'description' => 'Eliminar roles'
                            ])->syncRoles([$role1]);
    }
}
