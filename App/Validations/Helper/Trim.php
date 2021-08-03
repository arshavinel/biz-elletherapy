<?php

namespace App\Validations\Helper;

final class Trim {
    static function lessSpaces (string $info) {
        return trim(preg_replace('/\s+/', ' ', $info));
    }
}
