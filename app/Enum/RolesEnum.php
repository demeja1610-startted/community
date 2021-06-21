<?php
namespace App\Enum;

use App\Enum\PermissionsEnum;

class RolesEnum {
    public const user = 'user';
    public const admin = 'admin';
    public const super_admin = 'super_admin';

    public static function values() {
        return [
            self::user,
            self::admin,
            self::super_admin,
        ];
    }
}
