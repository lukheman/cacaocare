<?php

namespace App\Enums;

enum Role: string {

    case Admin = 'Admin';
    case Pasien = 'Pasien';

    public static function values(): array {
        return array_map(fn($case) => $case->value, self::cases());
    }

}
