<?php

namespace App\Validations;

use App\Core\Table\TableValidation;
use App\Languages\LangCMS;

class CMSValidation extends TableValidation {
    const TABLE         = 'validations_cms';
    const PRIMARY_KEY   = NULL;

    const TRANSLATOR    = LangCMS::class;
}
