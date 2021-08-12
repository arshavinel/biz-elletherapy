<?php

namespace Brain\Table;

use Arsh\Core\Table;
use Brain\Language\LangSite;

final class Media extends Table {
    const TABLE       = 'media';
    const PRIMARY_KEY = 'id_media';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('title', 'description');

    const FILES = array(
        'video' => array(
            'type'      => Table::DOC,
            'quality'   => 100
        )
    );
}
