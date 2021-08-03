<?php

namespace App\Core\Module\Syntax;

final class Backend {

    static function DB (array $db): array {
        foreach ($db as $key => $value) {
            $db[$key] = ("App\Core\Module\Syntax\Backend\DB::{$key}")($value);
        }

        return $db;
    }

    static function PHP (array $php): array {
        foreach ($php as $key => $value) {
            $php[$key] = ("App\Core\Module\Syntax\Backend\PHP::{$key}")($value);
        }

        return $php;
    }

    static function actions (array $actions): array {
        return $actions;
    }

    static function features (array $features): array {
        return $features;
    }

    static function fields (array $fields): array {
        return $fields;
    }
}
