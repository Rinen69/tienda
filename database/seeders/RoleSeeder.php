<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Crear roles si no existen
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $caja = Role::firstOrCreate(['name' => 'caja']);
        $inventario = Role::firstOrCreate(['name' => 'inventario']);

        // Crear permisos si no existen
        $permissions = [
            'medidas',    // Permiso para gestionar medidas
            'cajas',      // Permiso para gestionar cajas
            'articulos',  // Permiso para gestionar artículos
            'companias',  // Permiso para gestionar compañías
            'proveedors', // Permiso para gestionar proveedores
            'paquetes',   // Permiso para gestionar paquetes
            'ventas',     // Permiso para gestionar ventas
            'stocks',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Asignar permisos a los roles
        $admin->syncPermissions(['medidas','articulos','companias','proveedors','paquetes','ventas','stocks']); // Admin tiene todos los permisos
        $caja->givePermissionTo(['ventas','stocks','articulos']);        // Caja puede gestionar ventas
        $inventario->givePermissionTo(['paquetes','stocks','articulos' ]); // Inventario puede gestionar artículos y medidas

        // Asignar el rol admin al usuario con ID 1
        $user = User::find(1); // Cambia el ID si es necesario
        if ($user) {
            $user->assignRole($admin);
        }
    }
}
