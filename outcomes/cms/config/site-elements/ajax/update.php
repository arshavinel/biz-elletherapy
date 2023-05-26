<?php

use Arshavinel\ElleTherapy\Validation\CMSValidation;
use Arshavinel\ElleTherapy\Table\Config;

$form = CMSValidation::run($_POST, array(
    'industries_per_row__md' => array(
        "required|int|inArray:2,3,4"
    ),
    'industries_per_row__lg' => array(
        "required|int|inArray:2,3,4"
    ),
    'industries_per_row__xl' => array(
        "required|int|inArray:2,3,4"
    )
));

if ($form->valid()) {
    foreach ($form->values() as $title => $value) {
        Config::update(array(
                'set'   => "value = ?",
                'where' => "title = ?"
            ),
            array($value, $title)
        );
    }

    $form->message = array(
        'type' => 'success',
        'text' => 'Editat cu succes'
    );
}
else {
    $form->message = array(
        'type' => "danger",
        'text' => "Câmpuri completate greșit"
    );
}

echo $form->json();
