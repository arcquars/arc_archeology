<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleManagerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = Permission::firstOrCreate(['name' => 'manager-users']);
        $roleName = 'system-owner';

        $role = Role::findByName($roleName);

        if ($role) {
            // 3. Asignar el permiso al rol
            if (!$role->hasPermissionTo($permission)) {
                $role->givePermissionTo($permission);
                $this->command->info("Permiso '{$permission->name}' asignado al rol '{$role->name}'.");
            } else {
                $this->command->info("El rol '{$role->name}' ya tiene el permiso '{$permission->name}'.");
            }
        }
    }
}
