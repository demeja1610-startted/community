<?php

namespace Database\Seeders;

use App\Enum\RolesEnum;
use App\Enum\RolesPermissionsEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rawRoles = RolesEnum::values();
        $rolesPermissions = RolesPermissionsEnum::values();

        foreach($rawRoles as $rawRole) {
            $role = Role::create([
                'name' => $rawRole,
            ]);

            foreach($rolesPermissions[$rawRole] as $permission) {
                $role->givePermissionTo($permission);
            }
        }
    }
}
