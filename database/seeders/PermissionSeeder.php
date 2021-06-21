<?php

namespace Database\Seeders;

use App\Enum\PermissionsEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rawPermissions = PermissionsEnum::values();

        foreach($rawPermissions as $rawPermission) {
            Permission::create([
                'name' => $rawPermission,
            ]);
        }
    }
}
