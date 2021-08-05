<?php

namespace App\Core\Table;

use App\Core\Table;

abstract class TableMail extends Table {
    const MAILS_PER_DELIVERING;

    final static function deliver (): void {

    }
}
