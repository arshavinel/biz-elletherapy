<?php

namespace App\Tables;

use App\Core\Table;
use App\Languages\LangSite;

final class Interesting extends Table {
    const TABLE       = 'interesting';
    const PRIMARY_KEY = 'id_interesting';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('text');
}
