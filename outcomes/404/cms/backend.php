<?php

use Arsh\Core\Meta;

Meta::set('title',  '404');
Meta::set('robots', 'noindex, nofollow');

$breadcrumbs = array(
    'pages'     => array(
        '404' => NULL
    ),
    'actions' => array()
);

http_response_code(404);
