<?php

namespace Arshavinel\ElleTherapy\Table;

use Arshwell\Monolith\Table;

use Arshavinel\ElleTherapy\Language\LangSite;

final class SocialMedia extends Table {
    const TABLE       = 'social_media';
    const PRIMARY_KEY = 'id_media';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('text');

    const FILES = array(
        'icon' => array(
            'quality'   => 100,
            'sizes'     => array(
                'tinny' => array(
                    'width' => 85,
                    'height' => 85
                )
            )
        )
    );
}
