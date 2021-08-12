<?php

namespace Brain\Table;

use Arsh\Core\Table;
use Brain\Language\LangSite;

final class Article extends Table {
    const TABLE       = 'articles';
    const PRIMARY_KEY = 'id_article';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('title', 'description', 'seo_title', 'seo_description', 'seo_keywords');

    const FILES = array(
        'preview' => array(
            'quality'   => 100,
            'sizes'     => array(
                'big'       => array(
                    'width' => 1400,
                    'height' => 500
                ),
                'medium'    => array(
                    'width' => 750,
                    'height' => 640
                )
            )
        )
    );
}
