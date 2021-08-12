<?php

namespace Brain\Table\Industry;

use Arsh\Core\Table;
use Brain\Language\LangSite;

final class Characteristic extends Table {
    const TABLE       = 'industry_characteristics';
    const PRIMARY_KEY = 'id_characteristic';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('text');
}
