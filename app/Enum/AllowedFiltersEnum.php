<?php


namespace App\Enum;

class AllowedFiltersEnum
{
    public const filter = 'popular';
    public const answered = true;

    public static function values() {
        return [
            self::filter,
            self::answered,
        ];
    }
}
