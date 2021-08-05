<?php

namespace App\Tables;

use App\Core\Table;
use App\Languages\LangSite;

final class Industry extends Table {
    const TABLE       = 'industries';
    const PRIMARY_KEY = 'id_industry';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('title');
}
