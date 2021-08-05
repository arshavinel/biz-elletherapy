<?php

namespace App\Validations;

use App\Core\Table\TableValidation;
use App\Languages\LangSite;

class SiteValidation extends TableValidation {
    const TABLE         = 'validations_site';
    const PRIMARY_KEY   = NULL;

    const TRANSLATOR    = LangSite::class;
}
