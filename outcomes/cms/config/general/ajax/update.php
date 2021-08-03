<?php

use App\Validations\CMSValidation;
use App\Tables\Config;

$form = CMSValidation::run($_POST, array(
    'email' => array(
        "required|email"
    ),
    'phone_romania' => array(
        "required|minLength:10"
    ),
    'phone_moldova' => array(
        "required|minLength:10"
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
