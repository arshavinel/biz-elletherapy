<?php

use Arshavinel\ElleTherapy\Validation\SiteValidation;
use Arshavinel\ElleTherapy\Table\Event\Promo\Discount\Join;
use Arshavinel\ElleTherapy\Table\Event\Promo\Discount;

$form = SiteValidation::run($_POST,
    array(
        'id_discount' => array(
            "required|int|inDB:".Discount::class
        ),
        'email' => array(
            function ($value) {
                return trim($value);
            },
            "required|email",
            function ($key, $value) {
                if (!self::error('id_discount')
                && Join::count("id_discount = ? AND email LIKE ?", array(self::value('id_discount'), $value))) {
                    return "A fost deja adăugat";
                }
            }
        ),
        'privacy' => array(
            "required|int|equal:1"
        )
    )
);

if ($form->valid()) {
    $form->date = strtotime($form->value('date'));

    // if already joined
    if (!empty($_SESSION['events'][Discount::field('id_meeting', "id_discount = ?", [$form->value('id_discount')])]['discounts'][$form->value('id_discount')])) {
        Join::delete("id_join = ?", [$_SESSION['events'][Discount::field('id_meeting', "id_discount = ?", [$form->value('id_discount')])]['discounts'][$form->value('id_discount')]['id_join']]);
    }

    $id_join = Join::insert(
        "id_discount, email, inserted_at",
        "?, ?, UNIX_TIMESTAMP()",
        $form->values(array('id_discount', 'email'))
    );

    $_SESSION['events'][Discount::field('id_meeting', "id_discount = ?", [$form->value('id_discount')])]['discounts'][$form->value('id_discount')] = array(
        'id_join'   => $id_join,
        'email'     => $form->value('email')
    );

    $form->forget();
}
else {
    $form->remember(true);
}

echo $form->json();
