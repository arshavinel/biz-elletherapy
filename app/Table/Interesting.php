<?php

namespace Arshavinel\ElleTherapy\Table;

use Arshwell\Monolith\Table;

use Arshavinel\ElleTherapy\Language\LangSite;

final class Interesting extends Table {
    const TABLE       = 'interesting';
    const PRIMARY_KEY = 'id_interesting';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('text');
}
