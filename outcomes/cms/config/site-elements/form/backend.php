<?php

use Arshwell\Monolith\Meta;

use Arshavinel\ElleTherapy\Table\Config;

Meta::set('title', 'Elemente site');

$config = Config::select(array(
    'columns'   => "title, value",
    'where'     => "title LIKE 'industries_per_row__%'",
    'order'     => 'CASE `title`
                    WHEN "industries_per_row__md" THEN 1
                    WHEN "industries_per_row__lg" THEN 2
                    WHEN "industries_per_row__xl" THEN 3
                    ELSE 4 END'
));
