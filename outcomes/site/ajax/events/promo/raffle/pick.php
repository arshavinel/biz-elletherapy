<?php

use App\Validations\SiteValidation;
use App\Tables\Event\Promo\Raffle\Join;
use App\Tables\Event\Promo\Raffle;

$form = SiteValidation::run($_POST,
    array(
        'id_raffle' => array(
            "required|int|inDB:".Raffle::class
        )
    )
);

if ($form->valid()) {
    $form->name = NULL;

    $raffle = Raffle::first(
        array(
            'columns'   => "winner",
            'where'     => "id_raffle = ?"
        ),
        array($form->value('id_raffle'))
    );

    $winner = Join::first(
        array(
            'columns'   => "name, phone, email",
            'where'     => "id_join = ?"
        ),
        array($raffle->winner)
    );

    // if no winner yet
    if ($winner == NULL) {
        $winner = Join::first(
            array(
                'columns'   => "name, phone, email",
                'where'     => "id_raffle = ?",
                'order'     => "RAND()"
            ),
            array($form->value('id_raffle'))
        );

        if ($winner) {
            $raffle->winner = $winner->id();
            $raffle->edit();
        }
    }

    if ($winner) {
        $form->name = ('<b>'. $winner->name .'</b><br>('. trim($winner->phone .' | '. $winner->email, '| ') .')');
    }
}

echo $form->json();
