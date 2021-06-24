<?php

namespace App\Enum;

class SettingsEnum
{
    public const comments_depth = 'comments_depth';
    public const comments_pagination = 'comments_pagination';
    public const articles_pagination = 'articles_pagination';

    public static function values() {
        return [
            self::comments_depth => 1,
            self::comments_pagination => 20,
            self::articles_pagination => 20,
        ];
    }
}
