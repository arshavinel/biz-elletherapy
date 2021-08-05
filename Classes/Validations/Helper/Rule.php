<?php

namespace App\Validations\Helper;

use App\Core\Form;

final class Rule {
    static function phone ($key, $value) {
        if (preg_match("/[^\d\s\+ \(\)-]/", $value)) {
            return "Nu respecta formatul";
        }
    }
}
