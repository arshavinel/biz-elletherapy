<?php

namespace Arshavinel\ElleTherapy\Table;

use Arshwell\Monolith\Table;

use Arshavinel\ElleTherapy\Language\LangSite;

final class Industry extends Table {
    const TABLE       = 'industries';
    const PRIMARY_KEY = 'id_industry';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('title');
}
