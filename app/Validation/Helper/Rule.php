<?php

namespace Arshavinel\ElleTherapy\Validation\Helper;

use Arshwell\Monolith\Form;

final class Rule {
    static function phone ($key, $value) {
        if (preg_match("/[^\d\s\+ \(\)-]/", $value)) {
            return "Nu respecta formatul";
        }
    }
}
