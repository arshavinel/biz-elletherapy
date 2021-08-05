<?php

namespace App\Tables\Event\Promo;

use App\Core\Table;
use App\Languages\LangSite;

final class Discount extends Table {
    const TABLE       = 'event_promo_discounts';
    const PRIMARY_KEY = 'id_discount';

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
