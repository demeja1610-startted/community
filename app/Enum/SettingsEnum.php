<?php

namespace App\Enum;

class SettingsEnum
{
    public const comments_depth = 'comments_depth';
    public const comments_pagination = 'comments_pagination';

    public static function values() {
        return [
            self::comments_depth => 1,
            self::comments_pagination => 20,
        ];
    }
}
