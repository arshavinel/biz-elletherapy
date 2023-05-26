<?php

namespace Arshavinel\ElleTherapy\Table\Event\Promo;

use Arshwell\Monolith\Table;

use Arshavinel\ElleTherapy\Language\LangSite;

final class Raffle extends Table {
    const TABLE       = 'event_promo_raffles';
    const PRIMARY_KEY = 'id_raffle';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('title', 'slug', 'text', 'seo_title', 'seo_description', 'seo_keywords');

    const FILES = array(
        'bg_image' => array(
            'quality'   => 100,
            'sizes'     => array(
                'big'       => array(
                    'width' => 1366,
                    'height' => 768
                )
            )
        ),
        'seo_image' => array(
            'quality'   => 100,
            'sizes'     => array(
                'big'       => array(
                    'width' => 1200,
                    'height' => 627
                )
            )
        )
    );
}
