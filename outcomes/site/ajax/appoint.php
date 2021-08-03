<?php

use App\Core\Mail;
use App\Validations\SiteValidation;
use App\Tables\Form\Appointment;
use App\Tables\Service;

$form = SiteValidation::run($_POST,
    array(
        'lastname' => array(
            "required",
            function ($value) {
                return trim($value);
            },
            "minLength:3"
        ),
        'firstname' => array(
            "required",
            function ($value) {
                return trim($value);
            },
            "minLength:3"
        ),
        'email' => array(
            function ($value) {
                return trim($value);
            },
            "email"
        ),
        'phone' => array(
            "required",
            function ($value) {
                return trim($value);
            },
            "minLength:10"
        ),
        'id_service' => array(
            "required",
            function ($key, $value) {
                if (!is_numeric($value)) {
                    return "Alege un serviciu";
                }
            },
            "inDB:".Service::class
        ),
        'date' => array(
            "date"
        ),
        'message' => array(
            function ($value) {
                return trim($value);
            },
            "maxLength:300"
        ),
        'privacy' => array(
            "required|int|equal:1"
        )
    ),
    array(
        'inDB' => 'Serviciu invalid. Reîncarcă pagina!'
    )
);

if ($form->valid()) {
    $form->date = strtotime($form->value('date'));

    Appointment::insert(
        "lastname, firstname, email, phone, id_service, date, message, inserted_at",
        "?, ?, ?, ?, ?, ?, ?, UNIX_TIMESTAMP()",
        $form->values(array('lastname', 'firstname', 'email', 'phone', 'id_service', 'date', 'message'))
    );

    if (empty($_SESSION['appointments'])) {
        $_SESSION['appointments'] = 1;
    }
    else {
        $_SESSION['appointments']++;
    }

    if ($form->value('email')) {
        Mail::send(
            'appointments/confirmation',
            $form->value('email'),
            App\Views\Site::sentence('email.programare.subiect', NULL, true),
            array(
                'fields'    => array(
                    'lastname'  => $form->value('lastname'),
                    'firstname' => $form->value('firstname'),
                    'email'     => $form->value('email'),
                    'phone'     => $form->value('phone'),
                    'service'   => Service::field(
                        'title:lg',
                        "id_service = ?",
                        array($form->value('id_service'))
                    ),
                    'date'      => $form->value('date'),
                    'message'   => $form->value('message') ?: '<i>gol</i>'
                )
            )
        );
    }

    $form->forget();
}
else {
    $form->remember(true);
}

echo $form->json();
