<?php

namespace Arshavinel\ElleTherapy\Table;

use Arshwell\Monolith\Table\TableMaintenance;

final class Maintenance extends TableMaintenance {

    static function route (): string {
        return "404.maintenance";
    }

}
