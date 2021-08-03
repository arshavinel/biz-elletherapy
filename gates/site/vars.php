<?php

use App\Core\DB;
use App\Tables\Service;
use App\Tables\Config;
use App\Tables\Logo;

$global = array(
    'logos' => Logo::first(array(
        'columns'   => 'id_logo',
        'where'     => 'visible = 1',
        'files'     => true
    ))->files()
);
