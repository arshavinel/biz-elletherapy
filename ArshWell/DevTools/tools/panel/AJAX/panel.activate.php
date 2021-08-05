<?php

use App\Core\Table\TableValidation;
use App\Core\Session;

$form = TableValidation::run($_POST, array());

if ($form->valid()) {
    Session::setPanel('active',	true);
}

echo $form->json();
