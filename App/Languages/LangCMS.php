<?php

namespace App\Languages;

use App\Core\Language;

class LangCMS extends Language {
    const PAGINATION    = array("page-([1-9]\\d*)", "p-([1-9]\\d*)");
    const LANGUAGES     = array('ro');

    // abstract static function default(): string;
}
