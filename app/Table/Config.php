<?php

namespace Arshavinel\ElleTherapy\Table;

use Arshwell\Monolith\Table;

final class Config extends Table {
    const TABLE       = 'configs';
    const PRIMARY_KEY = NULL;

    // NOTE: Add new configs here!
    const defaults = array(
        'email'                     => "contact@elletherapy.ro",
        'phone_romania'             => "0752 415 127",
        'phone_moldova'             => "+373 79084963",
        'industries_per_row__md'    => 2,
        'industries_per_row__lg'    => 2,
        'industries_per_row__xl'    => 3
    );

    // GET and CREATE certain config
    static function title (string $title): string {
        $value = self::field('value', "title = ?", array($title));

        if (!$value && isset(self::defaults[$title])) {
            $value = self::defaults[$title];

            self::insert(
                "title, value",
                "?, ?",
                array($title, $value)
            );
        }

        return $value;
    }
}
