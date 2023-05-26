<?php

namespace Arshavinel\ElleTherapy\Table\Industry;

use Arshwell\Monolith\Table;

use Arshavinel\ElleTherapy\Language\LangSite;

final class Characteristic extends Table {
    const TABLE       = 'industry_characteristics';
    const PRIMARY_KEY = 'id_characteristic';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('text');
}
