<?php

namespace Brain\Table;

use Arsh\Core\Table;
use Brain\Language\LangSite;

final class Industry extends Table {
    const TABLE       = 'industries';
    const PRIMARY_KEY = 'id_industry';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('title');
}
