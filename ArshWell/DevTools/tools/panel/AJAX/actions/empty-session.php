<?php

use App\Core\Table\TableValidation;
use App\Core\Session;
use App\Core\Func;

$form = TableValidation::run($_POST, array());

if ($form->valid()) {
    Session::empty();

    $form->info = array(
        'status'    => 'The session has been emptied',
        'PHP'       => Func::readableTime((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000)
    );
}
else if ($form->expired()) {
    $form->info = array("Session expired. Reopen DevPanel!");
}

echo $form->json();
