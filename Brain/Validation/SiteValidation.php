<?php

namespace Brain\Validation;

use Arsh\Core\Table\TableValidation;
use Brain\Language\LangSite;

class SiteValidation extends TableValidation {
    const TABLE         = 'validations_site';
    const PRIMARY_KEY   = NULL;

    const TRANSLATOR    = LangSite::class;
}
