<?php

use Arshwell\Monolith\StaticHandler;

use Arshavinel\ElleTherapy\Table\Identity\Logo;

$_GLOBAL = array(
    'logos' => Logo::first(array(
        'columns'   => 'id_logo',
        'where'     => 'visible = 1',
        'files'     => true
    ))->files(),
    'appEnv' => call_user_func(function () {
        if (empty(StaticHandler::getEnvConfig()->getSiteRoot())) {
            return 'live';
        }

        if (StaticHandler::getEnvConfig('development.debug')) {
            return 'dev';
        } else {
            return 'stage';
        }
    }),
);
