<?php

use App\Core\Table\TableValidation;
use App\Core\Func;
use App\Core\ENV;

$form = TableValidation::run($_POST,
    array(
        'type' => array(
            "inArray:none,smart,instant"
        )
    ),
    array(
        'inArray' => "Invalid value"
    )
);

if ($form->valid()) {
    $env = ENV::fetch();

    $env->setMaintenance($form->value('type') != 'none', $form->value('type') != 'instant');
    $env->cache();

    $form->info = array(
        'status'    => 'Maintenance set',
        'PHP'       => Func::readableTime((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000)
    );
}
else if ($form->expired()) {
    $form->info = array("Session expired. Reopen DevPanel!");
}

echo $form->json();
