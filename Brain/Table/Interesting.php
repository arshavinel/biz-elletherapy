<?php

namespace Brain\Table;

use Arsh\Core\Table;
use Brain\Language\LangSite;

final class Interesting extends Table {
    const TABLE       = 'interesting';
    const PRIMARY_KEY = 'id_interesting';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('text');
}
