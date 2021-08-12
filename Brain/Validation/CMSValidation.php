<?php

namespace Brain\Validation;

use Arsh\Core\Table\TableValidation;
use Brain\Language\LangCMS;

class CMSValidation extends TableValidation {
    const TABLE         = 'validations_cms';
    const PRIMARY_KEY   = NULL;

    const TRANSLATOR    = LangCMS::class;
}
