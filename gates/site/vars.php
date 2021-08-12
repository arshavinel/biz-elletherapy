<?php

use Arsh\Core\DB;
use Brain\Table\Service;
use Brain\Table\Config;
use Brain\Table\Logo;

$global = array(
    'logos' => Logo::first(array(
        'columns'   => 'id_logo',
        'where'     => 'visible = 1',
        'files'     => true
    ))->files()
);
