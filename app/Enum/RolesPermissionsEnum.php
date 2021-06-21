<?php
namespace App\Enum;

class RolesPermissionsEnum {
    public const user = [
        PermissionsEnum::can_write_articles,
        PermissionsEnum::can_write_questions,
        PermissionsEnum::can_write_comments,
        PermissionsEnum::can_like,
        PermissionsEnum::can_vote,
    ];

    public const admin = [
        PermissionsEnum::can_manage_articles,
        PermissionsEnum::can_write_questions,
        PermissionsEnum::can_manage_users,
        PermissionsEnum::can_manage_comments,
        PermissionsEnum::can_manage_categories,
        PermissionsEnum::can_manage_tags,
        PermissionsEnum::can_manage_images,
    ];

    public const super_admin = [
        PermissionsEnum::can_manage_roles_and_permissions,
    ];

    public static function values() {
        return [
            'user' => self::user,
            'admin' => self::admin,
            'super_admin' => self::super_admin,
        ];
    }
}
