<?php

use Arsh\Core\Meta;
use Brain\Table\Config;

Meta::set('title', 'Setări generale');

$config = Config::select(array(
    'columns'   => "title, value",
    'order'     => 'CASE `title`
                    WHEN "email" THEN 1
                    WHEN "phone_romania" THEN 2
                    WHEN "phone_moldova" THEN 3
                    ELSE 4 END'
));
