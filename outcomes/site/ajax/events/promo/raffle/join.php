<?php

use Arshavinel\ElleTherapy\Validation\SiteValidation;
use Arshavinel\ElleTherapy\Table\Event\Promo\Raffle\Join;
use Arshavinel\ElleTherapy\Table\Event\Promo\Raffle;

$form = SiteValidation::run($_POST,
    array(
        'id_raffle' => array(
            "required|int|inDB:".Raffle::class
        ),
        'first_name' => array(
            function ($value) {
                return trim($value);
            },
            "required|minLength:3|maxLength:50"
        ),
        'last_name' => array(
            function ($value) {
                return trim($value);
            },
            "required|minLength:3|maxLength:50"
        ),
        'email' => array(
            function ($value) {
                return trim($value);
            },
            "email",
            function ($key, $value) {
                if (!self::error('id_raffle')) {
                    $id_raffle = self::value('id_raffle');
                    $id_meeting = Raffle::field('id_meeting', "id_raffle = ?", array($id_raffle));

                    $email = $_SESSION['events'][$id_meeting]['raffles'][$id_raffle]['email'] ?? NULL;

                    if (Join::count("id_raffle = ? AND email LIKE ? AND email != ?", array(self::value('id_raffle'), $value, $email))) {
                        return "A fost deja adăugat";
                    }
                }
            }
        ),
        'phone' => array(
            function ($value) {
                return trim($value);
            },
            function ($key, $value) {
                if (empty(self::error('email')) && empty(self::value('phone'))) {
                    return "Adaugă cel puțin telefonul";
                }
            },
            "minLength:10|maxLength:20"
        ),
        'privacy' => array(
            "required|int|equal:1"
        )
    )
);

if ($form->valid()) {
    $id_raffle = $form->value('id_raffle');
    $id_meeting = Raffle::field('id_meeting', "id_raffle = ?", array($id_raffle));

    $id_join = $_SESSION['events'][$id_meeting]['raffles'][$id_raffle]['id_join'] ?? NULL;
    $form->name = $form->value('first_name').' '.$form->value('last_name');

    // if new joiner
    if (empty($id_join)) {
        $id_join = Join::insert(
            "id_raffle, name, phone, email, inserted_at",
            "?, ?, ?, ?, UNIX_TIMESTAMP()",
            array($id_raffle, $form->value('name'), $form->value('phone'), $form->value('email'))
        );
    }
    else {
        Join::update(
            array(
                'set'   => "name, phone, email, updated_at = UNIX_TIMESTAMP()",
                'where' => "id_join = ?"
            ),
            array($form->value('name'), $form->value('phone'), $form->value('email'), $id_join)
        );
    }

    $_SESSION['events'][$id_meeting]['raffles'][$id_raffle] = array(
        'id_join'   => $id_join,
        'name'      => $form->value('name'),
        'phone'     => $form->value('phone'),
        'email'     => $form->value('email')
    );
}

$form->remember(true); // immortal entire session

echo $form->json();
