<?php

namespace App\Enum;

enum Role: string {

    case ADMIN = 'admin';
    case USER = 'user';

    public static function values(): array {
        return array(fn($case) => $case->value, self::cases());
    }

}
