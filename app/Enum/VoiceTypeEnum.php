<?php
namespace App\Enum;

class VoiceTypeEnum {
    public const PLUS = 'PLUS';
    public const MINUS = 'MINUS';

    public static function values() {
        return [
            self::MINUS,
            self::PLUS,
        ];
    }
}
