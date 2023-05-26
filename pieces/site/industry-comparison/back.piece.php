<?php

use Arshavinel\ElleTherapy\Table\Industry;
use Arshavinel\ElleTherapy\Table\Industry\Characteristic;

$industries = Industry::select(array(
    'columns'   => "title:lg",
    'order'     => "`order` ASC, id_industry DESC",
    'where'     => "id_industry IN (SELECT id_industry FROM industry_characteristics)"
));

foreach ($industries as &$industry) {
    $industry->characteristics = array(
        'visible' => Characteristic::select(
            array(
                'columns'   => 'text:lg',
                'where'     => "id_industry = ? AND hidden = 0",
                'order'     => "`order` ASC, id_characteristic DESC"
            ),
            array($industry->id())
        ),
        'hidden' => Characteristic::select(
            array(
                'columns'   => 'text:lg',
                'where'     => "id_industry = ? AND hidden = 1",
                'order'     => "`order` ASC, id_characteristic DESC"
            ),
            array($industry->id())
        )
    );

    unset($industry);
}
