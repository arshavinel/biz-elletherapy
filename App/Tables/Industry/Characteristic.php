<?php

namespace App\Tables\Industry;

use App\Core\Table;
use App\Languages\LangSite;

final class Characteristic extends Table {
    const TABLE       = 'industry_characteristics';
    const PRIMARY_KEY = 'id_characteristic';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('text');
}
