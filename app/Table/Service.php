<?php

namespace Arshavinel\ElleTherapy\Table;

use Arshwell\Monolith\Table;

use Arshavinel\ElleTherapy\Language\LangSite;

final class Service extends Table {
    const TABLE       = 'services';
    const PRIMARY_KEY = 'id_service';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('title', 'price', 'description');

    const FILES = array(
        'preview' => array(
            'quality' => 100,
            'sizes'   => array(
                'big' => array(
                    'width' => 1200,
                    'height' => 600
                ),
                'medium' => array(
                    'width' => 700,
                    'height' => 465
                )
            )
        )
    );
}
