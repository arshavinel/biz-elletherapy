<?php

use App\Validations\SiteValidation;
use App\Tables\ContactForm;

$form = SiteValidation::run($_POST, array(
    'name' => array(
        "required"
    ),
    'email' => array(
        "email"
    ),
    'phone' => array(
        "required"
    ),
    'message' => array(
        "maxLength:300"
    ),
    'privacy' => array(
        "required|int|equal:1"
    )
));

if ($form->valid()) {
    ContactForm::insert(
        "name, email, phone, message, inserted_at",
        "?, ?, ?, ?, UNIX_TIMESTAMP()",
        $form->values(array('name', 'email', 'phone', 'message'))
    );

    $form->forget();

    $form->message = "Mersi pentru mesaj. Te contactez in cel mai scurt timp posibil.";
}
else {
    $form->remember(true);
}

echo $form->json();
